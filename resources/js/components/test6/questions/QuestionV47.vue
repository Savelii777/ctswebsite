<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-47 test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div
                    class="test-explanation test-explanation-mob test-explanation-diagnostics"
                >
                    <p class="explanation-txt">
                        <b>Внимательно прочитайте синдромы:</b>
                        <br />I. Невралгия правого седалищного нерва
                        (ишиалгический синдром). <br />II. Периферическая
                        гипестезия в зоне иннервации правого седалищного нерва.
                        <br />III. Периферический парез мышц задней группы бедра
                        и голени справа.
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
                        :src="currentUrl + '/test-img/test47.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div
                        class="test-explanation test-explanation-desc
             test-explanation-diagnostics"
                    >
                        <p class="explanation-txt">
                            <b>Внимательно прочитайте синдромы:</b>
                            <br />I. Невралгия правого седалищного нерва
                            (ишиалгический синдром). <br />II. Периферическая
                            гипестезия в зоне иннервации правого седалищного
                            нерва. <br />III. Периферический парез мышц задней
                            группы бедра и голени справа.
                        </p>
                    </div>
                    <div v-for="(item, index) in answers" :key="index">
                        <p class="compliance-txt">
                            {{ item.symbol }}) {{ item.description }}
                        </p>
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
    data() {
        return {
            currentUrl: "",
            answers: [
                {
                    correct: "II и I синдромы",
                    symbol: "А",
                    result: null,
                    description:
                        "Какие синдромы наиболее точно указывают на локализацию процесса? "
                },
                {
                    correct: "III синдром",
                    symbol: "Б",
                    result: null,
                    description:
                        "Какой синдром дает лишь общее представление о локализации поражения?"
                },
                {
                    correct: "седалищный нерв",
                    symbol: "В",
                    result: null,
                    description:
                        "С какой локализацией процесса  вы бы его связали?"
                },
                {
                    correct: "седалищный нерв",
                    symbol: "Г",
                    result: null,
                    description:
                        "Сформулируйте вывод о локализации процесса, с которым можно связать все три синдрома."
                }
            ]
        };
    },
    created() {
        this.currentUrl = window.location.origin;
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 47,
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

            return this.serverAnswers.find(x => x.question_index == "47");
        }
    }
};
</script>
