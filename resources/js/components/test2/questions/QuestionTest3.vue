<template>
    <div class="test-block">
        <div class="test-number number">
            {{ordinalNumber}} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-arcs-of-reflexes-closure">
            <div class="test-caption">
                <p>
                    Укажите, где замыкаются дуги рефлексов
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test90.png'"
                        alt="courses"
                    />
                </div>
                <ul class="compliance-list">
                    <li :key="index" v-for="(item, index) in answers">
                        <p class="test-txt">{{ item.symbol }})</p>
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="answers[index].result"
                            v-bind:class="{
                                correct:
                                    correct(item.result, item.correct) == 1,
                                incorrect:
                                    correct(item.result, item.correct) == 0
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
                    correct: "Варолиев мост"
                },
                {
                    symbol: "Б",
                    result: null,
                    correct: "C5-C6"
                },
                {
                    symbol: "В",
                    result: null,
                    correct: "C7-C8"
                },
                {
                    symbol: "Г",
                    result: null,
                    correct: "Th7-Th8"
                },
                {
                    symbol: "Д",
                    result: null,
                    correct: "Th9-Th10"
                },
                {
                    symbol: "Е",
                    result: null,
                    correct: "Th11-Th12"
                },
                {
                    symbol: "Ж",
                    result: null,
                    correct: "L2-L4"
                },
                {
                    symbol: "З",
                    result: null,
                    correct: "L5,S1-S2"
                },
                {
                    symbol: "И",
                    result: null,
                    correct: "S4-S5"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 3,
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

            return this.serverAnswers.find(x => x.question_index == "3");
        }
    }
};
</script>
