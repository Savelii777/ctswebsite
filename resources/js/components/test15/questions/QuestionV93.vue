<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-89 test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Первичные симпатические и парасимпатические центры спинного
                    мозга и мозгового ствола
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b
                            >Рассмотрите схему и укажите, где расположены
                            первичные центры:
                        </b>
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
                        :src="currentUrl + '/test-img/test73.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b
                                >Рассмотрите схему и укажите, где расположены
                                первичные центры:
                            </b>
                        </p>
                    </div>
                    <div>
                        <p class="compliance-txt">
                            {{ symbols[0].symbol }})
                            {{ symbols[0].description }}
                        </p>
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="answers[0].result"
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
                            :readonly="serverAnswers"
                        />
                        <input
                            type="text"
                            class="test-input compliance-input mt-1"
                            v-model="answers[1].result"
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
                            :readonly="serverAnswers"
                        />
                    </div>
                    <div>
                        <p class="compliance-txt">
                            {{ symbols[1].symbol }})
                            {{ symbols[1].description }}
                        </p>
                        <input
                            type="text"
                            class="test-input compliance-input"
                            v-model="answers[2].result"
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
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            symbols: [
                {
                    symbol: "А",
                    result: null,
                    description: "Парасимпатические"
                },
                {
                    symbol: "Б",
                    result: null,
                    description: "Симпатические"
                }
            ],
            answers: [
                {
                    correct:
                        "в мозговом стволе (ножки мозга, варолиев мост, продолговатый мозг)",
                    result: null
                },
                {
                    correct: "в крестцовых сегментах спинного мозга",
                    result: null
                },
                {
                    correct: "в боковых рогах спинного мозга от С8 до L2",
                    result: null
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 93,
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

            return this.serverAnswers.find(x => x.question_index == "93");
        }
    }
};
</script>
