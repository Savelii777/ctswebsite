<template>
    <div class="test-block">
        <div class="test-number number">
            {{ordinalNumber}} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-segment-of-the-spinal-cord">
            <div class="test-caption">
                <p>
                    Пронумеруйте элементы сегмента спинного мозга
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div id="test-explanation">
                <ul class="explanation-list row">
                    <div>
                        <li>
                            <p class="explanation-txt">
                                Задний рог
                            </p>
                            <p class="explanation-txt">
                                1
                            </p>
                        </li>
                        <li>
                            <p class="explanation-txt">
                                Передний столб
                            </p>
                            <p class="explanation-txt">
                                2
                            </p>
                        </li>
                        <li>
                            <p class="explanation-txt">
                                Центральный канал
                            </p>
                            <p class="explanation-txt">
                                3
                            </p>
                        </li>
                        <li>
                            <p class="explanation-txt">
                                Задний корешок
                            </p>
                            <p class="explanation-txt">
                                4
                            </p>
                        </li>
                        <li>
                            <p class="explanation-txt">
                                Передний рог
                            </p>
                            <p class="explanation-txt">
                                5
                            </p>
                        </li>
                    </div>
                    <div>
                        <li>
                            <p class="explanation-txt">
                                Боковой столб
                            </p>
                            <p class="explanation-txt">
                                6
                            </p>
                        </li>
                        <li>
                            <p class="explanation-txt">
                                Спинальный ганглий
                            </p>
                            <p class="explanation-txt">
                                7
                            </p>
                        </li>
                        <li>
                            <p class="explanation-txt">
                                Передний корешок
                            </p>
                            <p class="explanation-txt">
                                8
                            </p>
                        </li>
                        <li>
                            <p class="explanation-txt">
                                Задние столбы
                            </p>
                            <p class="explanation-txt">
                                9
                            </p>
                        </li>
                    </div>
                </ul>
            </div>
            <div class="test-compliance">
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test2.png'"
                        alt="courses"
                    />
                </div>
                <ul class="compliance-list">
                    <li :key="index" v-for="(item, index) in answers">
                        <p class="test-txt">{{ item.symbol }})</p>
                        <input
                            type="text"
                            v-bind:class="{
                                correct:
                                    correct(item.result, item.correct) == 1,
                                incorrect:
                                    correct(item.result, item.correct) == 0
                            }"
                            class="test-input compliance-input"
                            :readonly="serverAnswers"
                            v-model="answers[index].result"
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
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            currentUrl: "",
            answers: [
                {
                    symbol: "А",
                    result: null,
                    correct: "1"
                },
                {
                    symbol: "Б",
                    result: null,
                    correct: "9"
                },
                {
                    symbol: "В",
                    result: null,
                    correct: "4"
                },
                {
                    symbol: "Г",
                    result: null,
                    correct: "7"
                },
                {
                    symbol: "Д",
                    result: null,
                    correct: "6"
                },
                {
                    symbol: "Е",
                    result: null,
                    correct: "3"
                },
                {
                    symbol: "Ж",
                    result: null,
                    correct: "8"
                },
                {
                    symbol: "З",
                    result: null,
                    correct: "2"
                },
                {
                    symbol: "И",
                    result: null,
                    correct: "5"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 2,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    methods: {
        insensitiveSearch(str1, str2) {
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
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "2");
        }
    }
};
</script>
