<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-types-of-sensitivity-disorders">
            <div class="test-caption">
                <p>
                    Диссоциированная анестезия
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
                        <b>Задание:</b>
                        <br />рассмотрите внимательно этот рисунок и ответьте
                        письменно на вопрос,
                        <b
                            >все ли виды чувствительности страдают при
                            поражении:</b
                        >
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
                        :src="currentUrl + '/test-img/test37.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div
                        class="test-explanation test-explanation-desc test-explanation-diagnostics"
                    >
                        <p class="explanation-txt">
                            <b>Задание:</b>
                            <br />рассмотрите внимательно этот рисунок и
                            ответьте письменно на вопрос,
                            <b
                                >все ли виды чувствительности страдают при
                                поражении:</b
                            >
                        </p>
                    </div>
                    <ul>
                        <li v-for="(item, index) in answers" :key="index">
                            <p class="compliance-txt">
                                {{ item.description }}
                            </p>
                            <div class="radio test-radio">
                                <div>
                                    <ul>
                                        <li class="answer-item">
                                            <input
                                                :id="'radio-v38-1-' + index"
                                                type="radio"
                                                :name="'radio-v38-' + index"
                                                :value="0"
                                                v-model="answers[index].result"
                                                :disabled="serverAnswers"
                                            />
                                            <label
                                                :for="'radio-v38-1-' + index"
                                                v-bind:class="{
                                                    correct:
                                                        correct(
                                                            answers[index]
                                                                .result,
                                                            answers[index]
                                                                .correct
                                                        ) == 1,
                                                    incorrect:
                                                        correct(
                                                            answers[index]
                                                                .result,
                                                            answers[index]
                                                                .correct
                                                        ) == 0
                                                }"
                                            >
                                                <b>1.</b> Все виды
                                                чувствительности.
                                            </label>
                                        </li>
                                        <li class="answer-item">
                                            <input
                                                :id="'radio-v38-2-' + index"
                                                type="radio"
                                                :name="'radio-v38-' + index"
                                                :value="1"
                                                v-model="answers[index].result"
                                                :disabled="serverAnswers"
                                            />
                                            <label
                                                :for="'radio-v38-2-' + index"
                                                v-bind:class="{
                                                    correct:
                                                        correct(
                                                            answers[index]
                                                                .result,
                                                            answers[index]
                                                                .correct
                                                        ) == 1,
                                                    incorrect:
                                                        correct(
                                                            answers[index]
                                                                .result,
                                                            answers[index]
                                                                .correct
                                                        ) == 0
                                                }"
                                            >
                                                <b>2.</b> Только поверхностная
                                                чувствительность.
                                            </label>
                                        </li>
                                        <li class="answer-item">
                                            <input
                                                :id="'radio-v38-3-' + index"
                                                type="radio"
                                                :name="'radio-v38-' + index"
                                                :value="2"
                                                v-model="answers[index].result"
                                                :disabled="serverAnswers"
                                            />
                                            <label
                                                :for="'radio-v38-3-' + index"
                                                v-bind:class="{
                                                    correct:
                                                        correct(
                                                            answers[index]
                                                                .result,
                                                            answers[index]
                                                                .correct
                                                        ) == 1,
                                                    incorrect:
                                                        correct(
                                                            answers[index]
                                                                .result,
                                                            answers[index]
                                                                .correct
                                                        ) == 0
                                                }"
                                            >
                                                <b>3.</b> Только глубокая и
                                                сложная чувствительность.
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct: 0,
                    description: "А)  Периферического нерва (1)?",
                    result: 0
                },
                {
                    correct: 0,
                    description: "Б)  Заднего корешка (2)?",
                    result: 0
                },
                {
                    correct: 1,
                    description: "В)  Заднего рога (3)?",
                    result: 0
                },
                {
                    correct: 2,
                    description: "Г)  Задних столбов (4)?",
                    result: 0
                },
                {
                    correct: 1,
                    description:
                        "Д)  Спинно-таламического тракта бокового столба (5)?",
                    result: 0
                },
                {
                    correct: 0,
                    description: "Е)  Медиальной петли (6)?",
                    result: 0
                },
                {
                    correct: 0,
                    description: "Ж)  Внутренней капсулы (7)?",
                    result: 0
                },
                {
                    correct: 0,
                    description: "З)  Задней центральной извилины (8)?",
                    result: 0
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 38,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    methods: {
        correct(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (answer === correct) {
                return 1;
            }

            return 0;
        }
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "38");
        }
    }
};
</script>
