<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-exercise-in-topical-diagnostics">
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
                        у больного имеется полное поперечное поражение спинного
                        мозга на уровне Th3.
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
                        :src="currentUrl + '/test-img/test25.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>ДАНО</b><br />
                            у больного имеется полное поперечное поражение
                            спинного мозга на уровне Th3.
                        </p>
                    </div>
                    <p class="compliance-txt">
                        А) Определите, у кого из больных эта патология
                        произвольных движений.
                    </p>
                    <div class="test-description">
                        <div>
                            <img
                                :src="currentUrl + '/test-img/icon1.png'"
                                alt="courses"
                            />
                            <p>центральный паралич</p>
                        </div>
                        <div>
                            <img
                                :src="currentUrl + '/test-img/icon2.png'"
                                alt="courses"
                            />
                            <p>периферический паралич</p>
                        </div>
                    </div>
                    <div class="radio test-radio test-radio-img">
                        <ul>
                            <div class="row">
                                <li
                                    :key="index"
                                    class="col-md-4 col-sm-6 col-6"
                                    v-for="(item, index) in getAnswerList(0)"
                                >
                                    <input
                                        :id="'v23-radio-top' + index"
                                        type="radio"
                                        name="radio23"
                                        :value="index"
                                        v-model="answer[0].result"
                                        :disabled="serverAnswers"
                                    />
                                    <label
                                        :for="'v23-radio-top' + index"
                                        v-bind:class="{
                                            correct: topArrcorrect() == 1,
                                            incorrect: topArrcorrect() == 0
                                        }"
                                    >
                                        {{ item.symbol }}.
                                    </label>
                                    <img
                                        class="compliance-img-answer"
                                        :src="currentUrl + '/' + item.img"
                                        alt="courses"
                                    />
                                </li>
                            </div>
                        </ul>
                    </div>
                    <ul>
                        <li
                            :key="index"
                            v-for="(item, index) in getAnswerList(1)"
                        >
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[1].result"
                                :disabled="serverAnswers"
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
                            />
                        </li>
                    </ul>
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
                    part: 0,
                    symbol: "1",
                    result: null,
                    img: "test-img/man1.png"
                },
                {
                    part: 0,
                    symbol: "2",
                    result: null,
                    img: "test-img/man2.png"
                },
                {
                    part: 0,
                    symbol: "3",
                    result: null,
                    img: "test-img/man3.png"
                },
                {
                    part: 0,
                    symbol: "4",
                    result: null,
                    img: "test-img/man4.png"
                },
                {
                    part: 0,
                    symbol: "5",
                    result: null,
                    img: "test-img/man5.png"
                },
                {
                    part: 0,
                    symbol: "6",
                    result: null,
                    img: "test-img/man6.png"
                },
                {
                    part: 0,
                    symbol: "7",
                    result: null,
                    img: "test-img/man7.png"
                },
                {
                    part: 0,
                    symbol: "8",
                    result: null,
                    img: "test-img/man8.png"
                },
                {
                    part: 0,
                    symbol: "9",
                    result: null,
                    img: "test-img/man9.png"
                },
                {
                    part: 0,
                    symbol: "10",
                    result: null,
                    img: "test-img/man10.png"
                },
                {
                    part: 1,
                    symbol: "Б",
                    description:
                        " Сформулируйте синдром параличей конечностей и нарушения функций тазовых органов",
                    result: null
                }
            ],
            answer: [
                {
                    result: 0,
                    correct: 0
                },
                {
                    result: "",
                    correct:
                        "Нижний центральный парапарез (параплегия) с нарушением функций тазовых органов по центральному типу."
                }
            ]
        };
    },
    methods: {
        getAnswerList(part) {
            return this.answers.filter(item => item.part === part);
        },
        topArrcorrect() {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.answer[0].result == this.answer[0].correct) {
                return 1;
            }

            return 0;
        },
        insensitiveSearch(str1, str2) {
            try {
                str1 = str1.replace("(", "");
                str1 = str1.replace(")", "");
                str2 = str2.replace("(", "");
                str2 = str2.replace(")", "");
            } catch (error) {}

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
    },
    watch: {
        answer: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 23,
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

            return this.serverAnswers.find(x => x.question_index == "23");
        }
    }
};
</script>
