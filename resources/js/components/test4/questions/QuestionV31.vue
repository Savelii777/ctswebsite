<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-indicated-by-arrows">
            <div class="test-caption">
                <p>
                    Назвать дерматомы, указанные стрелками.
                    <span>
                    Образец: 1. С1-С4. 2. и т. п.
                </span>
                    <span>
                    Эту работу Вы легко выполните, не подглядывая в ответ, если
                    внимательно рассмотрите рисунок и увидите связь дерматомов с
                    сегментами спинного мозга.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="swipe-block">
                <div class="row">
                    <div class="col-sm-2 col-3">
                        <img
                            :src="currentUrl + '/test-img/arm1.png'"
                            alt="courses"
                        />
                    </div>
                    <div class="col-sm-10 col-9">
                        <p>
                            Увеличивайте картинку с помощью двух пальцев
                        </p>
                    </div>
                </div>
            </div>
            <div class="test-compliance">
                <div class="compliance-img compliance-img-31">
                    <img
                        :src="currentUrl + '/test-img/test32.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <ul class="compliance-list">
                        <li :key="index" v-for="(item, index) in answers">
                            <p class="test-txt">{{ item.symbol }}.</p>
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
                    correct: "C1-C4",
                    symbol: "1",
                    result: null
                },
                {
                    correct: "C5-C6",
                    symbol: "2",
                    result: null
                },
                {
                    correct: "C7-C8",
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Th7-Th8",
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Th9-Th10",
                    symbol: "5",
                    result: null
                },
                {
                    correct: "Th11-Th12",
                    symbol: "6",
                    result: null
                },
                {
                    correct: "L1-L5",
                    symbol: "7",
                    result: null
                },
                {
                    correct: "S1-S3",
                    symbol: "8",
                    result: null
                },
                {
                    correct: "S4-S5",
                    symbol: "9",
                    result: null
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 31,
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

            return this.serverAnswers.find(x => x.question_index == "31");
        }
    }
};
</script>
