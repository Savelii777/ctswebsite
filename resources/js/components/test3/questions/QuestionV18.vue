<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-prevalence-of-paralysis">
            <div class="test-caption">
                <p>
                    Параличи в зависимости от их распространенности
                    <span>
                    Подпишите наименования параличей в зависимости от их
                    распространенности.
                </span>
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="compliance-block">
                    <div class="row">
                        <div class="compliance-elem">
                            <div class="compliance-img">
                                <img
                                    :src="currentUrl + '/' + answers[0].img"
                                    alt="courses"
                                    class="compliance-img-answer"
                                />
                            </div>
                            <div class="compliance-input">
                                <p class="test-txt">{{ answers[0].symbol }})</p>
                                <input
                                    type="text"
                                    class="test-input compliance-input"
                                    v-model="answers[0].result"
                                    :readonly="serverAnswers"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                answers[0].result,
                                                answers[0].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                answers[0].result,
                                                answers[0].correct
                                            ) == 0
                                    }"
                                />
                            </div>
                        </div>
                        <div class="compliance-elem">
                            <div class="compliance-img">
                                <img
                                    :src="currentUrl + '/' + answers[1].img"
                                    alt="courses"
                                    class="compliance-img-answer"
                                />
                            </div>
                            <div class="compliance-input">
                                <p class="test-txt">{{ answers[1].symbol }})</p>
                                <input
                                    type="text"
                                    class="test-input compliance-input"
                                    v-model="answers[1].result"
                                    :readonly="serverAnswers"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                answers[1].result,
                                                answers[1].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                answers[1].result,
                                                answers[1].correct
                                            ) == 0
                                    }"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="compliance-elem">
                            <div class="compliance-img">
                                <img
                                    class="compliance-img-answer"
                                    :src="currentUrl + '/' + answers[2].img"
                                    alt="courses"
                                />
                            </div>
                            <div class="compliance-input">
                                <p class="test-txt">{{ answers[2].symbol }})</p>
                                <input
                                    type="text"
                                    class="test-input compliance-input"
                                    v-model="answers[2].result"
                                    :readonly="serverAnswers"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                answers[2].result,
                                                answers[2].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                answers[2].result,
                                                answers[2].correct
                                            ) == 0
                                    }"
                                />
                            </div>
                        </div>
                        <div class="compliance-elem">
                            <div class="compliance-img">
                                <img
                                    class="compliance-img-answer"
                                    :src="currentUrl + '/' + answers[3].img"
                                    alt="courses"
                                />
                            </div>
                            <div class="compliance-input">
                                <p class="test-txt">{{ answers[3].symbol }})</p>
                                <input
                                    type="text"
                                    class="test-input compliance-input"
                                    v-model="answers[3].result"
                                    :readonly="serverAnswers"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                answers[3].result,
                                                answers[3].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                answers[3].result,
                                                answers[3].correct
                                            ) == 0
                                    }"
                                />
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
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    symbol: "А",
                    img: "test-img/test7-a.png",
                    result: null,
                    correct: "Моноплегия"
                },
                {
                    symbol: "Б",
                    img: "test-img/test7-b.png",
                    result: null,
                    correct: "Параплегия"
                },
                {
                    symbol: "В",
                    img: "test-img/test7-c.png",
                    result: null,
                    correct: "Гемиплегия"
                },
                {
                    symbol: "Г",
                    img: "test-img/test7-d.png",
                    result: null,
                    correct: "Тетраплегия"
                }
            ]
        };
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
    watch: {
        answers: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 18,
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

            return this.serverAnswers.find(x => x.question_index == "18");
        }
    }
};
</script>
