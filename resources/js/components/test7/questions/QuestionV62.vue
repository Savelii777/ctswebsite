<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-the-blind-field-is-shaded">
            <div class="test-caption">
                <p>
                    Анализаторы зрения, слуха и обоняния
                    <span>
                    Назовите выявленную у больного патологию (заштриховано
                    «слепое» поле).
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-explanation">
                <p class="explanation-txt">
                    <b>Совет:</b><br />
                    чтобы не путаться при назывании стороны (правосторонняя или
                    левосторонняя), при рассматривании карты зрения
                    представляйте себе ее в виде очков: наденьте эти очки, и
                    сразу станет ясно, какое поле зрения не видно одним и другим
                    глазом.
                </p>
            </div>
            <div class="test-compliance">
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test55.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <ul class="compliance-list">
                        <li v-for="(item, index) in answers" :key="index">
                            <p class="test-txt">{{ item.symbol }}.</p>
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
                    correct: "Левосторонняя гемианопсия (одноименная)",
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Правосторонняя гемианопсия (одноименная)",
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Битемпоральная (разноименная) гемианопсия",
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Амавроз",
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Биназальная (разноименная) гемианопсия",
                    symbol: "5",
                    result: null
                },
                {
                    correct: "Квадрантная гемианопсия",
                    symbol: "6",
                    result: null
                },
                {
                    correct: "Скотомы",
                    symbol: "7",
                    result: null
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 62,
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

            return this.serverAnswers.find(x => x.question_index == "62");
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
