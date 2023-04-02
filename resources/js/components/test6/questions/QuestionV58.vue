<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-58 test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Упражнение в составлении синдромов
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b>Даны симптомы:</b>
                        <br />1. Сила мышц правой ноги понижена до 4 баллов.
                        <br />2. Нерезко выраженное повышение тонуса мышц правой
                        ноги по пирамидному типу. <br />3. При ходьбе отмечается
                        спастичность справа. <br />4. Брюшные рефлексы справа
                        отсутствуют. <br />5. Повышение коленного и ахиллова
                        рефлексов справа. <br />6. Клонус коленной чашки и стопы
                        справа. <br />7. Патологический рефлекс
                        Бабинского справа. <br />8. Болевая чувствительность
                        понижена слева от Th8 и до конца. <br />9. Температурная
                        чувствительность понижена там же. <br />10. Болевая
                        чувствительность понижена справа в области Th6 и Th7.
                        <br />11. Понижение мышечно-суставной чувствительности в
                        правой ноге. <br />12. Нарушение
                        двухмерно-пространственного чувства справа от Th6 и до
                        конца.
                    </p>
                </div>
                <div class="swipe-block">
                    <div class="row">
                        <div class="col-sm-2 col-3">
                            <img
                                :src="currentUrl + '/test-img/arm1.png'"
                                alt="courses"
                            />
                            <img
                                :src="currentUrl + '/test-img/arm2.png'"
                                alt="courses"
                            />
                        </div>
                        <div class="col-sm-10 col-9">
                            <p>
                                Перемешайте картинку вверх-вниз, влево-впарво и
                                увеличивайтечто бы увидеть ее целиком
                            </p>
                        </div>
                    </div>
                </div>
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test85.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Даны симптомы:</b>
                            <br />1. Сила мышц правой ноги понижена до 4 баллов.
                            <br />2. Нерезко выраженное повышение тонуса
                            мышц правой ноги по пирамидному типу. <br />3. При
                            ходьбе отмечается спастичность справа. <br />4.
                            Брюшные рефлексы справа отсутствуют. <br />5.
                            Повышение коленного и ахиллова рефлексов справа.
                            <br />6. Клонус коленной чашки и стопы справа.
                            <br />7. Патологический рефлекс Бабинского справа.
                            <br />8. Болевая чувствительность понижена слева от
                            Th8 и до конца. <br />9. Температурная
                            чувствительность понижена там же. <br />10. Болевая
                            чувствительность понижена справа в области Th6 и
                            Th7. <br />11. Понижение мышечно-суставной
                            чувствительности в правой ноге. <br />12. Нарушение
                            двухмерно-пространственного чувства справа от Th6 и
                            до конца.
                        </p>
                    </div>
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            <b class="last"
                                >Из этих симптомов составьте три синдрома
                                (письменно); в скобках укажите номера симптомов,
                                из которых составлен каждый синдром.</b
                            >
                            Примечание: один из данных симптомов, по-видимому,
                            не удастся включить в синдром, поскольку он
                            одиночный.
                        </p>
                    </div>
                    <div class="compliance-elem-add">
                        <div
                            class="compliance-elem-add__item"
                            v-for="(item, index) in groups"
                            :key="index"
                        >
                            <drag class="drappable-elm">
                                <p class="test-txt">{{ index + 1 }}.</p>
                                <input
                                    type="text"
                                    v-model="groups[index]"
                                    class="test-input compliance-input"
                                    :disabled="serverAnswers"
                                    v-bind:class="{
                                        correct: correctGroups(item) == 1,
                                        incorrect: correctGroups(item) == 0
                                    }"
                                />
                            </drag>
                            <div class="squares-item__btn drappable">
                                <drag
                                    class="drag"
                                    :key="index"
                                    :transfer-data="{ item, example: 'groups' }"
                                    @dragstart="dragging = item"
                                    @dragend="dragging = null"
                                >
                                    <button
                                        type="button"
                                        class="compliance-btn-remove"
                                        @click="remove(index, item)"
                                    >
                                        x
                                    </button>
                                </drag>
                            </div>
                        </div>
                        <button
                            type="button"
                            class="compliance-btn-add"
                            @click="add"
                        >
                            Добавить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        number: {
            type: String,
            default: "01"
        },
        from: {
            type: String,
            default: "01"
        },
        serverAnswers: {
            type: Array
        },
      questions: {
            type: Number,
        },
        ordinalNumber: {
            type: String,
            default: "01"
        },
    },
    created() {
        this.currentUrl = window.location.origin;
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answer = this.currentQuestionAnswers.answer;
            this.groups = this.currentQuestionAnswers.answer[0].result;
        }
    },
    data() {
        return {
            currentUrl: "",
            answer_groups: [],
            groups: [""],
            dragging: null,
            answers: [
                {
                    result: [],
                    correct: [
                        "Нижний центральный монопарез справа",
                        "Проводниковая гипестезия поверхностной чувствительности слева от Th8",
                        "Проводниковая гипестезия глубокой и сложной чувствительности справа от Th6"
                    ]
                }
            ]
        };
    },

    mounted() {
        for (let i = 0; i < 10; i++) this.answer_groups.push("");
    },
    methods: {
        insensitiveSearch(str1, str2) {
            if (!str1 || !str2) {
                return false;
            }

            str1 = str1.replace("(", "");
            str1 = str1.replace(")", "");
            str2 = str2.replace("(", "");
            str2 = str2.replace(")", "");

            let search_str = new RegExp(str2, "ig");

            if (!str1) return false;

            var result = str1.search(search_str);
            return result != -1;
        },
        correctGroups(item) {
            if (!this.serverAnswers) {
                return null;
            }

            let isFound = 0;

            this.answers[0].correct.forEach(element => {
                if (this.insensitiveSearch(item, element)) {
                    isFound = 1;
                }
            });

            return isFound;
        },
        add() {
            this.groups.push("");
        },
        handleDragover(group, data, event) {},

        remove(index, item) {
            let localIndex = null;
            for (let i = 0; i < this.answer_groups.length; i++) {
                if (this.answer_groups[i] == index + 1) {
                    this.answer_groups[i] = "";
                }
            }

            this.groups.splice(index, 1);
        },
        handleDrop(localIndex) {
            let index = null;

            for (let i = 0; i < this.groups.length; i++) {
                if (this.groups[i] == this.dragging) {
                    index = i;
                    break;
                }
            }

            this.answer_groups[localIndex] = index + 1;

            this.$nextTick(function() {
                this.add();
                var i = 0;
                while (i < this.groups.length) {
                    if (this.groups[i] == "") {
                        this.groups.splice(i, 1);
                    } else {
                        ++i;
                    }
                }
            });
        }
    },
    watch: {
        groups: {
            handler: function(newVal, oldVal) {
                this.answers[0].result = this.groups;
                this.$emit("answer", {
                    question_index: 58,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "58");
        }
    }
};
</script>

<style>
.drag,
.drop {
    display: inline-block;
}
.drop.allowed {
    background-color: #dfd;
}
</style>
