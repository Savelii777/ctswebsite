<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                    <span>
                    Назовите характер паралича при данной локализации процесса.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="compliance-block row">
                    <div
                        class="col-md-4 test__item-img"
                        v-for="(item, index) in answers"
                        :key="index"
                    >
                        <img
                            style="min-height:280px;object-fit:contain"
                            class="compliance-img-answer"
                            :src="currentUrl + '/' + item.img"
                            alt="courses"
                        />
                        <p class="compliance-txt">
                            {{ item.symbol }}) {{ item.description }}
                        </p>
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="answers[index].result"
                            v-bind:class="{
                                correct:
                                    correct(
                                        answers[index].result,
                                        answers[index].correct
                                    ) == 1,
                                incorrect:
                                    correct(
                                        answers[index].result,
                                        answers[index].correct
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
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct: "Альтернирующий паралич",
                    symbol: "А",
                    result: null,
                    description:
                        "Очаг в левой половине продолговатого мозга. Поражены: ядро X пары и пирамидный путь",
                    img: "test-img/test66(1).png"
                },
                {
                    correct: "Альтернирующий паралич",
                    symbol: "Б",
                    result: null,
                    description:
                        "Поражение левой половины Варолиева моста. Поражены: ядро VII пары и пирамидный путь.",
                    img: "test-img/test66(2).png"
                },
                {
                    correct: "Бульбарный паралич",
                    symbol: "В",
                    result: null,
                    description:
                        "У больного – избирательное поражение двигательных ядер продолговатого мозга..",
                    img: "test-img/test66(3).png"
                },
                {
                    correct: "Псевдобульбарный паралич",
                    symbol: "Г",
                    result: null,
                    description:
                        "Двустороннее поражение центральных (надъядерных) путей бульбарных черепных нервов и пирамидных путей.",
                    img: "test-img/test66(4).png"
                },
                {
                    correct: "Альтернирующий паралич",
                    symbol: "Д",
                    result: null,
                    description:
                        "В левой ножке мозга поражены: ядро III пары и пирамидный путь.",
                    img: "test-img/test66(5).png"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 79,
                    answer: this.answers
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

            return this.serverAnswers.find(x => x.question_index == "79");
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
