<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-48 test-exercise-in-topical-diagnostic">
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
                        <br />1. Стреляющие боли в пояснице справа, ррадиирующие
                        по задней поверхности правой ноги в пятку и III-V
                        пальцы. <br />2. Эти боли усиливаются при наклоне
                        туловища вправо. <br />3. Выражены симптомы Нери и
                        Дежерина справа. <br />4. Болезненны паравертебральные
                        точки L5 и S1 справа. <br />5. Походка щадящая
                        (анталгическая), хромает на правую ногу. <br />6.
                        Болевая и тактильная гипестезия в области, сказанной на
                        рисунке штрихами. <br />7. Мышечно-суставное чувство
                        понижено в V пальце правой стопы. <br />8. Атрофия мышц
                        задней группы правого бедра и голени на 1,5 см. <br />9.
                        Гипотония икроножной и ягодичных мышц справа. <br />10.
                        Вынужденное положение правой стопы – «перонеальная
                        стопа». <br />11. Ахиллов и подошвенный рефлексы справа
                        отсутствуют.
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
                        :src="currentUrl + '/test-img/test80.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Даны симптомы:</b>
                            <br />1. Стреляющие боли в пояснице справа,
                            ррадиирующие по задней поверхности правой ноги в
                            пятку и III-V пальцы. <br />2. Эти боли усиливаются
                            при наклоне туловища вправо. <br />3. Выражены
                            симптомы Нери и Дежерина справа. <br />4. Болезненны
                            паравертебральные точки L5 и S1 справа. <br />5.
                            Походка щадящая (анталгическая), хромает на правую
                            ногу. <br />6. Болевая и тактильная гипестезия в
                            области, сказанной на рисунке штрихами. <br />7.
                            Мышечно-суставное чувство понижено в V пальце правой
                            стопы. <br />8. Атрофия мышц задней группы правого
                            бедра и голени на 1,5 см. <br />9. Гипотония
                            икроножной и ягодичных мышц справа. <br />10.
                            Вынужденное положение правой стопы – «перонеальная
                            стопа». <br />11. Ахиллов и подошвенный рефлексы
                            справа отсутствуют.
                        </p>
                    </div>
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b class="last"
                                >Составьте из симптомов синдромы в соответствии
                                с методическими указаниями.</b
                            >
                            <br />
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
                        "Корешковые боли в зоне L5 и S1 справа (1, 2, 3, 4, 5)",
                        "Корешковая гипестезия в зоне L5 и S1 справа (6, 7)",
                        "Периферический парез мышц задней группы бедра, голени и ягодицы справа (8, 9, 10, 11)"
                    ]
                }
            ]
        };
    },

    mounted() {
        for (let i = 0; i < 10; i++) this.answer_groups.push("");
    },
    watch: {
        groups: {
            handler: function(newVal, oldVal) {
                this.answers[0].result = this.groups;
                this.$emit("answer", {
                    question_index: 48,
                    answer: this.answers
                });
            },
            deep: true
        }
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
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "48");
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
