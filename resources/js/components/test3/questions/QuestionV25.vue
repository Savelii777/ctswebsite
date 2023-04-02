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
                        поражен конус спинного мозга.
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
                        :src="currentUrl + '/test-img/test27.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>ДАНО</b><br />
                            поражен конус спинного мозга.
                        </p>
                    </div>
                    <p class="compliance-txt">
                        А) У кого из больных такая патология произвольных
                        движений и тазовых функций.
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
                                        :id="'v25-radio-top' + index"
                                        type="radio"
                                        name="radio25"
                                        :value="index"
                                        v-model="answer[0].result"
                                        :disabled="serverAnswers"
                                    />
                                    <label
                                        :for="'v25-radio-top' + index"
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
                    <p class="compliance-txt">
                        Б) Советую внимательно рассмотреть схему: целы ли
                        рефлекторные дуги и их связь с корой?
                    </p>
                    <div class="radio test-radio">
                        <div>
                            <div
                                class="answer-item"
                                v-for="(item, index) in getAnswerList(1)"
                                :key="index"
                            >
                                <input
                                    :id="'v25-radio' + index"
                                    type="radio"
                                    name="radiov25"
                                    :value="index"
                                    v-model="answer[1].result"
                                    :disabled="serverAnswers"
                                />
                                <label
                                    :for="'v25-radio' + index"
                                    v-bind:class="{
                                        correct: botArrcorrect() == 1,
                                        incorrect: botArrcorrect() == 0
                                    }"
                                >
                                    {{ item.symbol }}. {{ item.description }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li
                            v-for="(item, index) in getAnswerList(2)"
                            :key="index"
                        >
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[2].result"
                                :disabled="serverAnswers"
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
                    symbol: "1",
                    result: null,
                    description: "Да"
                },
                {
                    part: 1,
                    symbol: "2",
                    result: null,
                    description: "Нет"
                },
                {
                    part: 1,
                    symbol: "3",
                    result: null,
                    description: "Частично"
                },
                {
                    part: 2,
                    symbol: "В",
                    description: " Какой вывод следует сделать?",
                    result: null
                }
            ],
            answer: [
                {
                    result: 0,
                    correct: 5
                },
                {
                    result: 0,
                    correct: 0
                },
                {
                    result: "",
                    correct:
                        "Произвольные движения конечностей сохранены. Нарушения функций тазовых органов по периферическому типу."
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
        botArrcorrect() {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.answer[1].result == this.answer[1].correct) {
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
                    question_index: 25,
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

            return this.serverAnswers.find(x => x.question_index == "25");
        }
    }
};
</script>
