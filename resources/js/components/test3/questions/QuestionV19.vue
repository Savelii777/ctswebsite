<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div
            class="test-main test-exercise-in-topical-diagnostics test-exercise-in-topical-diagnostics-19"
        >
            <div class="test-caption">
                <p>
                    Иннервация наружного (поперечно-полосатого) сфинктера мочевого
                    пузыря и прямой кишки
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b>ДАНО</b><br />
                        у больного поражена правая половина<br />
                        спинного мозга на уровне Th3.
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
                        :src="currentUrl + '/test-img/test23.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>ДАНО</b><br />
                            у больного поражена правая половина<br />
                            спинного мозга на уровне Th3.
                        </p>
                    </div>
                    <p class="explanation-txt">
                        <span
                            >Укажите будет ли нарушено мочеиспускание
                            (дефекация).</span
                        >
                    </p>
                    <div class="radio test-radio">
                        <div>
                            <input
                                :id="'v19-01-radio'"
                                type="radio"
                                name="radio19"
                                v-model="answers[0].result"
                                value="1"
                                :disabled="serverAnswers"
                            />
                            <label
                                v-bind:class="{
                                    correct: correct() == 1,
                                    incorrect: correct() == 0
                                }"
                                :for="'v19-01-radio'"
                            >
                                А) Да
                            </label>
                            <input
                                :id="'v19-02-radio'"
                                type="radio"
                                name="radio19"
                                v-model="answers[0].result"
                                value="0"
                                :disabled="serverAnswers"
                            />
                            <label
                                v-bind:class="{
                                    correct: correct() == 1,
                                    incorrect: correct() == 0
                                }"
                                :for="'v19-02-radio'"
                            >
                                Б) Нет
                            </label>
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
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [{ result: 1, correct: 0 }]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 19,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    methods: {
        correct() {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.answers[0].result == this.answers[0].correct) {
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

            return this.serverAnswers.find(x => x.question_index == "19");
        }
    }
};
</script>
