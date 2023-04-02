<template>
    <div class="test-block">
        <div class="test-number number">
            {{ordinalNumber}} <b>/ {{ questions }}</b>
        </div>
        <div
            class="test-main  test-exercise-in-topical-diagnostics-preparatory"
        >
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b>ДАНО</b><br />
                        поражение конуса спинного мозга (conus medullaris).
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
                        :src="currentUrl + '/test-img/test16.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>ДАНО</b><br />
                            поражение конуса спинного мозга (conus medullaris).
                        </p>
                    </div>
                    <p class="explanation-txt">
                        <span>Укажите, какие рефлексы исчезнут.</span>
                    </p>
                    <div class="compliance-block">
                        <div class="compliance-elem-add">
                            <div
                                :key="index"
                                class="compliance-elem-add__item"
                                v-for="(item, index) in groups"
                            >
                                <div>
                                    <p class="test-txt">{{ index + 1 }}.</p>
                                    <input
                                        type="text"
                                        v-model="groups[index]"
                                        class="test-input compliance-input"
                                        v-bind:class="{
                                            correct: correct(item) == 1,
                                            incorrect: correct(item) == 0
                                        }"
                                        :readonly="serverAnswers"
                                    />
                                </div>
                                <div class="squares-item__btn">
                                    <div
                                        :key="index"
                                        :transfer-data="{
                                            item,
                                            example: 'groups'
                                        }"
                                    >
                                        <button
                                            class="compliance-btn-remove"
                                            @click="remove(index, item)"
                                        >
                                            x
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="compliance-btn-add"
                                @click.prevent="add"
                            >
                                Добавить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        ordinalNumber: {
            type: String,
            default: "01"
        },
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
            answer: [
                {
                    result: []
                }
            ],
            correctAnswers: ["анальный рефлекс"]
        };
    },

    mounted() {
        for (let i = 0; i < 10; i++) this.answer_groups.push("");
    },
    methods: {
        add() {
            this.groups.push("");
        },
        remove(index, item) {
            for (let i = 0; i < this.answer_groups.length; i++) {
                if (this.answer_groups[i] == index + 1) {
                    this.answer_groups[i] = "";
                }
            }
            this.groups.splice(index, 1);
        },
        insensitiveSearch(str1, str2) {
            let search_str = new RegExp(str2, "ig");

            if (!str1) return false;

            var result = str1.search(search_str);

            return result != -1;
        },
        correct(answer) {
            if (!this.serverAnswers) {
                return null;
            }

            let isCorrect = 0;

            this.correctAnswers.forEach(correct => {
                if (this.insensitiveSearch(answer, correct)) {
                    isCorrect = 1;
                }
            });

            return isCorrect;
        }
    },
    watch: {
        groups: {
            handler: function(newVal, oldVal) {
                this.answer[0].result = this.groups;

                this.$emit("answer", {
                    question_index: 8,
                    answer: this.answer
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

            return this.serverAnswers.find(x => x.question_index == "8");
        }
    }
};
</script>
