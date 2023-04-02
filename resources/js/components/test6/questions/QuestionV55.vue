<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
                <div class="test-explanation test-explanation-mob">
                    <p class="explanation-txt">
                        <b>Даны синдромы:</b>
                        <br />I. Периферический парез мышц правой руки.
                        <br />II. Центральный парез мышц правой ноги (нижний
                        центральный монопарез справа). <br />III.Сегментарная
                        анестезия в области С5-Th6 справа. <br /><b
                            >Дописать пропущенное</b
                        >
                        <br /><img
                            :src="currentUrl + '/test-img/icon3.png'"
                            alt="courses"
                        />поверхностная чувствительность <br /><img
                            :src="currentUrl + '/test-img/icon4.png'"
                            alt="courses"
                        />глубокая чувствительность <br /><img
                            :src="currentUrl + '/test-img/icon12.png'"
                            alt="courses"
                        />пирамидный путь <br /><img
                            :src="currentUrl + '/test-img/icon13.png'"
                            alt="courses"
                        />пирамидный путь
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
                        :src="currentUrl + '/test-img/test50.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Даны синдромы:</b>
                            <br />I. Периферический парез мышц правой руки.
                            <br />II. Центральный парез мышц правой ноги (нижний
                            центральный монопарез справа).
                            <br />III.Сегментарная анестезия в области С5-Th6
                            справа. <br /><b>Дописать пропущенное</b> <br /><img
                                :src="currentUrl + '/test-img/icon3.png'"
                                alt="courses"
                            />поверхностная чувствительность <br /><img
                                :src="currentUrl + '/test-img/icon4.png'"
                                alt="courses"
                            />глубокая чувствительность <br /><img
                                :src="currentUrl + '/test-img/icon12.png'"
                                alt="courses"
                            />пирамидный путь <br /><img
                                :src="currentUrl + '/test-img/icon13.png'"
                                alt="courses"
                            />пирамидный путь
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
                        <p class="compliance-txt">
                            {{ item.description_info }}
                        </p>
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
            answers: [
                {
                    correct: "Сегментарная анестезия в области С5-Th6 справа",
                    symbol: "А",
                    result: null,
                    description:
                        "Какой синдром прямо указывает на локализацию очага?"
                },
                {
                    correct: "Задние рога на уровне С5-Th6 справа",
                    symbol: "Б",
                    result: null,
                    description: "Назовите локализацию этого очага."
                },
                {
                    correct:
                        "Двигательные волокна в периферических нервах,  передних корешках или клетки передних рогов в области шейного утолщения справа",
                    symbol: "В",
                    result: null,
                    description:
                        "Перечислите все возможные очаги поражения, с которыми можно связать I синдром, и подчеркните наиболее вероятный."
                },
                {
                    correct: "пирамидного",
                    symbol: "Г",
                    result: null,
                    description:
                        "Допишите фразу (на своей бумаге): «II синдром – центральный парез мышц правой ноги – указывает на поражение … пути»."
                },
                {
                    correct: "На уровне C3-Th6 сегментов справа",
                    symbol: "Д",
                    result: null,
                    description:
                        "На уровне каких сегментов и с какой стороны поражен этот путь?"
                },
                {
                    correct:
                        "сером веществе спинного мозга, в его задних и передних рогах на уровне C3-Th6 сегментов справа. Вовлечен и проходящий  здесь в боковом столбе пирамидный путь",
                    symbol: "Е",
                    result: null,
                    description:
                        "Сформулируйте топический диагноз: «Патологический очаг локализуется в … »."
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 55,
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

            return this.serverAnswers.find(x => x.question_index == "55");
        }
    }
};
</script>
