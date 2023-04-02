<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-peripheral-autonomic-nervous-system">
            <div class="test-caption">
                <p>
                    Строение периферической вегетативной нервной системы
                    <span>
                    В чем отличие строения периферической вегетативной нервной
                    системы от строения периферической соматической нервной
                    системы?
                </span>
                    <span>
                    Составьте перечень наименований элементов периферической
                    вегетативной нервной системы и этапов пути вегетативного
                    импульса от первичных центров к иннервируемым органам.
                    Используйте цифровые обозначения на рисунках I, II, III.
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
            <div class="test-compliance test-compliance-last">
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test72.png'"
                        alt="courses"
                    />
                </div>
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
                    correct: "Клетки боковых рогов спинного мозга",
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Передние рога спинного мозга",
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Передние корешки спинного мозга",
                    symbol: "3",
                    result: null
                },
                {
                    correct:
                        "Rami communicantes albi (покрытые миелиновой оболочкой) или преганглионарные волокна",
                    symbol: "4",
                    result: null
                },
                {
                    correct:
                        "Паравертебральный ганглий (из симпатической паравертебральной цепочки)",
                    symbol: "5",
                    result: null
                },
                {
                    correct:
                        "Превертебральный ганглий (например, из солнечного сплетения)",
                    symbol: "6",
                    result: null
                },
                {
                    correct:
                        "Интрамуральный ганглий (например, из Ауэрбахова сплетения)",
                    symbol: "7",
                    result: null
                },
                {
                    correct:
                        "Rami communicantes grisei (безмиелиновые волокна) или постганглионарные волокна",
                    symbol: "8",
                    result: null
                },
                {
                    correct: "Периферический нерв",
                    symbol: "9",
                    result: null
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 92,
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
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "92");
        }
    }
};
</script>
