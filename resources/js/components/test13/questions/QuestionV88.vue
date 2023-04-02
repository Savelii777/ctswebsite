<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div
            class="test-main test-higher-cortical-functions-and-their-pathologies"
        >
            <div class="test-caption">
                <p>
                    Высшие корковые функции и их патологии
                    <span>
                    Назовите следующую патологию
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance row">
                <ul class="col-md-6">
                    <br />
                    <li
                        class="answer-item"
                        v-for="(item, index) in firstPart"
                        :key="index"
                    >
                        <p class="compliance-txt">
                            {{ item.symbol }}) {{ item.description }}
                        </p>
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="firstPart[index].result"
                            v-bind:class="{
                                correct:
                                    correct(
                                        firstPart[index].result,
                                        firstPart[index].correct
                                    ) == 1,
                                incorrect:
                                    correct(
                                        firstPart[index].result,
                                        firstPart[index].correct
                                    ) == 0
                            }"
                            :readonly="serverAnswers"
                        />
                    </li>
                </ul>
                <ul class="col-md-6">
                    <li
                        class="answer-item"
                        v-for="(item, index) in secondPart"
                        :key="index"
                    >
                        <p class="compliance-txt">
                            {{ item.symbol }}) {{ item.description }}
                        </p>
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="secondPart[index].result"
                            v-bind:class="{
                                correct:
                                    correct(
                                        secondPart[index].result,
                                        secondPart[index].correct
                                    ) == 1,
                                incorrect:
                                    correct(
                                        secondPart[index].result,
                                        secondPart[index].correct
                                    ) == 0
                            }"
                            :readonly="serverAnswers"
                        />
                    </li>
                </ul>
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
    data() {
        return {
            answers: [
                {
                    correct: "Дизартрия",
                    part: 0,
                    symbol: "А",
                    result: null,
                    description: " Нарушение артикуляции речи"
                },
                {
                    correct: "Сенсорная афазия",
                    part: 0,
                    symbol: "В",
                    result: null,
                    description: " Нарушение понимания речи"
                },
                {
                    correct: "Аграфия",
                    part: 0,
                    symbol: "Д",
                    result: null,
                    description: " Нарушение навыков в письме"
                },
                {
                    correct: "Акалькулия",
                    part: 0,
                    symbol: "Ж",
                    result: null,
                    description: " Нарушение счета"
                },
                {
                    correct: "Зрительная агнозия",
                    part: 0,
                    symbol: "Д",
                    result: null,
                    description: " Нарушение анализа зрительных ощущений"
                },
                {
                    correct: "Астереогнозия",
                    part: 0,
                    symbol: "Д",
                    result: null,
                    description:
                        " Нарушение способности узнавать предмет путем ощупывания"
                },
                {
                    correct: "Моторная афазия",
                    part: 1,
                    symbol: "Б",
                    result: null,
                    description: " Нарушение двигательных речевых навыков"
                },
                {
                    correct: "Амнестическая афазия",
                    part: 1,
                    symbol: "Г",
                    result: null,
                    description: " Забывание названий предметов"
                },
                {
                    correct: "Алексия",
                    part: 1,
                    symbol: "Е",
                    result: null,
                    description: " Нарушение чтения"
                },
                {
                    correct: "Апраксия",
                    part: 1,
                    symbol: "З",
                    result: null,
                    description: " Нарушение навыков действий"
                },
                {
                    correct: "Слуховая агнозия",
                    part: 1,
                    symbol: "К",
                    result: null,
                    description: " Нарушение анализа звуковых сигналов"
                },
                {
                    correct: "Аутотопагнозия",
                    part: 1,
                    symbol: "М",
                    result: null,
                    description:
                        " Нарушение пространственных представлений о частях своего те"
                }
            ]
        };
    },
    created() {
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
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

            return this.serverAnswers.find(x => x.question_index == "88");
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 88,
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
