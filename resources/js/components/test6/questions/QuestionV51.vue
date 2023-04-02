<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-51 test-exercise-in-topical-diagnostic">
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
                        <br /><b
                            >Разберите каждый из трех синдромов, с точки зрения
                            их топико-диагностического значения.</b
                        >
                        <br /><b>Даны синдромы:</b> <br />I. Периферический
                        тетрапарез, преимущественно дистальный. <br />II.
                        Периферическая дистальная тетрагипестезия (или
                        полиневритическая тетрагипестезия). <br />III. Невралгии
                        в дистальных отделах конечностей.
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
                        :src="currentUrl + '/test-img/test48.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div
                        class="test-explanation test-explanation-desc test-explanation-diagnostics"
                    >
                        <p class="explanation-txt">
                            <br /><b
                                >Разберите каждый из трех синдромов, с точки
                                зрения их топико-диагностического значения.</b
                            >
                            <br /><b>Даны синдромы:</b> <br />I. Периферический
                            тетрапарез, преимущественно дистальный. <br />II.
                            Периферическая дистальная тетрагипестезия (или
                            полиневритическая тетрагипестезия). <br />III.
                            Невралгии в дистальных отделах конечностей.
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
                    correct:
                        "Периферическая дистальная (полиневритическая) тетрагипестезия",
                    symbol: "А",
                    result: null,
                    description:
                        "Какой из синдромов точно указывает на локализацию поражения в периферических нервах?"
                },
                {
                    correct:
                        "Клетки переднего рога, двигательные волокна корешков, двигательные волокна периферических нервов",
                    symbol: "Б",
                    result: null,
                    description:
                        " Укажите все возможные очаги поражения, вызывающие развитие I синдрома"
                },
                {
                    correct:
                        "Периферических нервов конечностей, преимущественно в дистальных отделах",
                    symbol: "В",
                    result: null,
                    description:
                        "Допишите фразу: все три синдрома характерны для поражения…"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 51,
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

            return this.serverAnswers.find(x => x.question_index == "51");
        }
    }
};
</script>
