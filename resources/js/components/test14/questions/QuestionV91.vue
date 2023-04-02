<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-87 test-liquor">
            <div class="test-caption">
                <p>
                    Спинномозговая жидкость (цереброспинальная жидкость, liquor)
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b>Дано:</b>
                        <br />На схеме номерами указаны различные элементы
                        системы ликворных путей.
                    </p>
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
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test71.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b>
                            <br />На схеме номерами указаны различные элементы
                            системы ликворных путей.
                        </p>
                    </div>
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            <br /><b class="last"
                                >Составьте указатель к рисунку, дописав нужный
                                номер</b
                            >
                        </p>
                    </div>
                    <ul class="compliance-list">
                        <li v-for="(item, index) in answers" :key="index">
                            <input
                                type="text"
                                class="test-input compliance-input small-inputs"
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
                            <p class="test-txt">
                                {{ item.symbol }}) {{ item.description }}
                            </p>
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
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct: "1",
                    symbol: "А",
                    result: null,
                    description:
                        " Сосудистое сплетение в боковых желудочках (хориодное сплетение)"
                },
                {
                    correct: "2",
                    symbol: "Б",
                    result: null,
                    description: " Монро отверстие "
                },
                {
                    correct: "3",
                    symbol: "В",
                    result: null,
                    description: " III желудочек "
                },
                {
                    correct: "4",
                    symbol: "Г",
                    result: null,
                    description: " Сильвиев водопровод "
                },
                {
                    correct: "5",
                    symbol: "Д",
                    result: null,
                    description: " IV желудочек "
                },
                {
                    correct: "6",
                    symbol: "Е",
                    result: null,
                    description: " Отверстие Мажанди "
                },
                {
                    correct: "7",
                    symbol: "Ж",
                    result: null,
                    description: " Большая цистерна мозга "
                },
                {
                    correct: "8",
                    symbol: "З",
                    result: null,
                    description:
                        " Субарахноидальное пространство спинного мозга "
                },
                {
                    correct: "9",
                    symbol: "И",
                    result: null,
                    description: " Pia mater – мягкая мозговая оболочка "
                },
                {
                    correct: "10",
                    symbol: "К",
                    result: null,
                    description: " Arachnoidea – паутинная мозговая оболочка "
                },
                {
                    correct: "11",
                    symbol: "Л",
                    result: null,
                    description: " Пахионовы грануляции"
                },
                {
                    correct: "12",
                    symbol: "М",
                    result: null,
                    description: " Венозный синус в твердой мозговой оболочке "
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 91,
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

            return this.serverAnswers.find(x => x.question_index == "91");
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
