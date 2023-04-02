<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-69 test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div
                    class="test-explanation test-explanation-mob test-explanation-diagnostics"
                >
                    <p class="explanation-txt">
                        <b>Дано:</b><br />
                        Центр взора в левой лобной доле управляет правым центром
                        взора в мосту.
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
                        :src="currentUrl + '/test-img/test60.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br />
                            Центр взора в левой лобной доле управляет правым
                            центром взора в мосту.
                        </p>
                    </div>
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            <b class="last">Допишите пропущенное:</b>
                        </p>
                    </div>
                    <div>
                        <p class="compliance-txt">
                            {{ answers[0].symbol }})
                            {{ answers[0].description }}
                        </p>
                        <input
                            type="text"
                            class="test-input compliance-input mb-1"
                            v-model="answer[0].result"
                            v-bind:class="{
                                correct:
                                    correct(
                                        answer[0].result,
                                        answer[0].correct
                                    ) == 1,
                                incorrect:
                                    correct(
                                        answer[0].result,
                                        answer[0].correct
                                    ) == 0
                            }"
                            :readonly="serverAnswers"
                        />
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="answer[1].result"
                            v-bind:class="{
                                correct:
                                    correct(
                                        answer[1].result,
                                        answer[1].correct
                                    ) == 1,
                                incorrect:
                                    correct(
                                        answer[1].result,
                                        answer[1].correct
                                    ) == 0
                            }"
                            :readonly="serverAnswers"
                        />
                    </div>
                    <div>
                        <p class="compliance-txt">
                            {{ answers[1].symbol }})
                            {{ answers[1].description }}
                        </p>
                        <input
                            type="text"
                            class="test-input compliance-input mb-1"
                            v-model="answer[2].result"
                            v-bind:class="{
                                correct:
                                    correct(
                                        answer[2].result,
                                        answer[2].correct
                                    ) == 1,
                                incorrect:
                                    correct(
                                        answer[2].result,
                                        answer[2].correct
                                    ) == 0
                            }"
                            :readonly="serverAnswers"
                        />
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="answer[3].result"
                            v-bind:class="{
                                correct:
                                    correct(
                                        answer[3].result,
                                        answer[3].correct
                                    ) == 1,
                                incorrect:
                                    correct(
                                        answer[3].result,
                                        answer[3].correct
                                    ) == 0
                            }"
                            :readonly="serverAnswers"
                        />
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
        }
    },
    data() {
        return {
            answers: [
                {
                    symbol: "А",
                    result: null,
                    description:
                        "При раздражении левого центра взора в коре возбуждается мостовой центр взора … (где?) и глаза отводятся … (куда?)."
                },
                {
                    symbol: "Б",
                    result: null,
                    description:
                        "При поражении коркового центра слева глаза не могут быть отведены … (куда?), то есть развивается паралич взора … (куда?)."
                }
            ],
            answer: [
                {
                    correct: "справа",
                    result: null
                },
                {
                    correct: "вправо",
                    result: null
                },
                {
                    correct: "вправо",
                    result: null
                },
                {
                    correct: "вправо",
                    result: null
                }
            ]
        };
    },
    watch: {
        answer: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 69,
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

            return this.serverAnswers.find(x => x.question_index == "69");
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
        correct(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.insensitiveSearch(answer, correct)) {
                return 1;
            }

            return 0;
        }
    }
};
</script>
