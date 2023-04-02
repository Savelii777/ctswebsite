<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-signs-of-paralysis-paresis">
            <div class="test-caption">
                <p>
                    Признаки поражения мозжечка
                    <span>
                    Вы, конечно, уже ознакомились с заданным текстом из
                    учебника? Вы составили словарь из новых слов? Теперь
                    проверьте, как вы их запомнили.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-explanation">
                <p class="explanation-txt">
                    <b class="last">
                        Из числа предлагаемых слов выпишите только те, которые
                        указывают на поражение мозжечка.
                        <br /> </b
                    ><br />
                </p>
            </div>
            <div class="radio test-radio tests-radio">
                <div>
                    <div
                        class="answer-item"
                        v-for="(item, index) in firstPart"
                        :key="index"
                    >
                        <input
                            :id="'82-radio1' + index"
                            type="checkbox"
                            :name="'radio1' + index"
                            v-model="firstPart[index].result"
                            :disabled="serverAnswers"
                        />
                        <label
                            :for="'82-radio1' + index"
                            v-bind:class="{
                                correct:
                                    correctTest(
                                        firstPart[index].result,
                                        firstPart[index].correct
                                    ) == 1,
                                incorrect:
                                    correctTest(
                                        firstPart[index].result,
                                        firstPart[index].correct
                                    ) == 0
                            }"
                        >
                            {{ item.symbol }}) {{ item.description }}
                        </label>
                    </div>
                </div>
                <div>
                    <div
                        class="answer-item"
                        v-for="(item, index) in secondPart"
                        :key="index"
                    >
                        <input
                            :id="'82-radio2' + index"
                            type="checkbox"
                            :name="'radio2' + index"
                            v-model="secondPart[index].result"
                            :disabled="serverAnswers"
                        />
                        <label
                            :for="'82-radio2' + index"
                            v-bind:class="{
                                correct:
                                    correctTest(
                                        secondPart[index].result,
                                        secondPart[index].correct
                                    ) == 1,
                                incorrect:
                                    correctTest(
                                        secondPart[index].result,
                                        secondPart[index].correct
                                    ) == 0
                            }"
                        >
                            {{ item.symbol }}) {{ item.description }}
                        </label>
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
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct: true,
                    part: 0,
                    symbol: "А",
                    result: false,
                    description: " Атаксия"
                },
                {
                    correct: false,
                    part: 0,
                    symbol: "Б",
                    result: false,
                    description: " Парестезии"
                },
                {
                    correct: true,
                    part: 0,
                    symbol: "В",
                    result: false,
                    description: " Нистагм "
                },
                {
                    correct: true,
                    part: 0,
                    symbol: "Г",
                    result: false,
                    description: " Дисметрия"
                },
                {
                    correct: true,
                    part: 0,
                    symbol: "Д",
                    result: false,
                    description: " Гиперметрия"
                },
                {
                    correct: false,
                    part: 0,
                    symbol: "Е",
                    result: false,
                    description: " Анестезия"
                },
                {
                    correct: true,
                    part: 0,
                    symbol: "Ж",
                    result: false,
                    description: " Адиадохокинез"
                },
                {
                    correct: true,
                    part: 1,
                    symbol: "З",
                    result: false,
                    description: " Гипотония"
                },
                {
                    correct: true,
                    part: 1,
                    symbol: "И",
                    result: false,
                    description: " Асинергия"
                },
                {
                    correct: true,
                    part: 1,
                    symbol: "К",
                    result: false,
                    description: " Скандированная речь"
                },
                {
                    correct: false,
                    part: 1,
                    symbol: "Л",
                    result: false,
                    description: " Гиперпатия"
                },
                {
                    correct: true,
                    part: 1,
                    symbol: "М",
                    result: false,
                    description: " Интенционное дрожание"
                },
                {
                    correct: false,
                    part: 1,
                    symbol: "Н",
                    result: false,
                    description: " Тремор покоя"
                },
                {
                    correct: true,
                    part: 1,
                    symbol: "О",
                    result: false,
                    description: " Брадителекинезия"
                }
            ]
        };
    },
    computed: {
        firstPart() {
            return this.answers.filter(item => item.part === 0);
        },
        secondPart() {
            return this.answers.filter(item => item.part === 1);
        },
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "85");
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 85,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    methods: {
        correctTest(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (answer === correct) {
                return 1;
            }

            return 0;
        }
    }
};
</script>
