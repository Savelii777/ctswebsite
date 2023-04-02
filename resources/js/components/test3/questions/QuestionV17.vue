<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-signs-of-paralysis-paresis">
            <div class="test-caption">
                <p>
                    Признаки параличей (парезов)
                    <span>
                    Выберите соответсвующие пункты
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="compliance-block">
                    <p class="compliance-txt">
                        А) Периферического <br/>паралича (пареза)
                    </p>
                    <div class="radio test-radio">
                        <div>
                            <div
                                class="answer-item"
                                v-for="(item, index) in topArr"
                                :key="index"
                            >
                                <input
                                    :id="'v17-01-radio' + index"
                                    type="checkbox"
                                    name="radio"
                                    v-model="topArr[index].result"
                                    :disabled="serverAnswers"
                                />
                                <label
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                topArr[index].result,
                                                topArr[index].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                topArr[index].result,
                                                topArr[index].correct
                                            ) == 0
                                    }"
                                    :for="'v17-01-radio' + index"
                                >
                                    <span>{{ item.symbol }}.</span>
                                    {{ item.description }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="compliance-block">
                    <p class="compliance-txt">
                        Б) Центрального<br/>
                        паралича (пареза)
                    </p>
                    <div class="radio test-radio">
                        <div>
                            <div
                                class="answer-item"
                                v-for="(item, index) in botArr"
                                :key="index"
                            >
                                <input
                                    :id="'v17-02-radio' + index"
                                    type="checkbox"
                                    name="radio"
                                    v-model="botArr[index].result"
                                    :disabled="serverAnswers"
                                />
                                <label
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                botArr[index].result,
                                                botArr[index].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                botArr[index].result,
                                                botArr[index].correct
                                            ) == 0
                                    }"
                                    :for="'v17-02-radio' + index"
                                >
                                    <span>{{ item.symbol }}.</span>
                                    {{ item.description }}
                                </label>
                                <div></div>
                            </div>
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
            this.topArr.forEach((element, index) => {
                this.topArr[index] = this.currentQuestionAnswers.answer[index];
            });

            let helperIndex = 9;

            this.botArr.forEach((element, index) => {
                this.botArr[index] = this.currentQuestionAnswers.answer[
                    helperIndex
                    ];
                helperIndex++;
            });
        }
    },
    data() {
        return {
            topArr: [
                {
                    symbol: "1",
                    result: null,
                    correct: true,
                    description:
                        "Отсутствие активных движений (или ограничение объема активных движений)"
                },
                {
                    symbol: "2",
                    result: null,
                    correct: true,
                    description: "Снижение мышечной силы"
                },
                {
                    symbol: "3",
                    result: null,
                    correct: true,
                    description: " Арефлексия (гипорефлексия)"
                },
                {
                    symbol: "4",
                    result: null,
                    correct: null,
                    description: " Гиперрефлексия"
                },
                {
                    symbol: "5",
                    result: null,
                    correct: null,
                    description: "Патологические рефлексы"
                },
                {
                    symbol: "6",
                    result: null,
                    correct: true,
                    description: "Локальная атрофия мышц"
                },
                {
                    symbol: "7",
                    result: null,
                    correct: null,
                    description: "Диффузная атрофия мышц"
                },
                {
                    symbol: "8",
                    correct: true,
                    result: null,
                    description: "Атония мышц (гипотония)"
                },
                {
                    symbol: "9",
                    correct: null,
                    result: null,
                    description: "Гипертонус мышц"
                }
            ],
            botArr: [
                {
                    symbol: "1",
                    result: null,
                    correct: true,
                    description:
                        "Отсутствие активных движений (или ограничение объема активных движений)"
                },
                {
                    symbol: "2",
                    result: null,
                    correct: true,
                    description: "Снижение мышечной силы"
                },
                {
                    symbol: "3",
                    correct: null,
                    result: null,
                    description: " Арефлексия (гипорефлексия)"
                },
                {
                    symbol: "4",
                    result: null,
                    correct: true,
                    description: " Гиперрефлексия"
                },
                {
                    symbol: "5",
                    result: null,
                    correct: true,
                    description: "Патологические рефлексы"
                },
                {
                    symbol: "6",
                    result: null,
                    correct: null,
                    description: "Локальная атрофия мышц"
                },
                {
                    symbol: "7",
                    result: null,
                    correct: true,
                    description: "Диффузная атрофия мышц"
                },
                {
                    symbol: "8",
                    result: null,
                    correct: null,
                    description: "Атония мышц (гипотония)"
                },
                {
                    symbol: "9",
                    result: null,
                    correct: true,
                    description: "Гипертонус мышц"
                }
            ]
        };
    },
    watch: {
        topArr: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 17,
                    answer: [...this.topArr, ...this.botArr]
                });
            },
            deep: true
        },
        botArr: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 17,
                    answer: [...this.topArr, ...this.botArr]
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

            return this.serverAnswers.find(x => x.question_index == "17");
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
    }
};
</script>

<style lang="scss" scoped>
label.incorrect::before {
    border-color: red;
}
</style>
