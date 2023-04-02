<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-53 test-exercise-in-topical-diagnostic">
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
                        <br />I. Периферический проксимальный трипарез
                        периферический парез мышц правой руки и нижний
                        периферический парапарез).
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
                        :src="currentUrl + '/test-img/test49.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Даны синдромы:</b>
                            <br />I. Периферический проксимальный трипарез
                            периферический парез мышц правой руки и нижний
                            периферический парапарез).
                        </p>
                    </div>
                    <div class="test-explanation test-explanation-diagnostics">
                        <p class="explanation-txt">
                            <br /><b>Дописать пропущенное</b>
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
                    correct: "в передних рогах спинного мозга",
                    symbol: "А",
                    result: null,
                    description:
                        "Как вы знаете, периферический парезнаблюдается при поражении любой части периферического двигательного нейрона. Где поражение у нашего больного? "
                },
                {
                    correct: "чувствительные волокна",
                    symbol: "Б",
                    result: null,
                    description:
                        "Это может быть в периферическом нерве, но кроме двигательных волокон нервы содержат и…",
                    description_info:
                        "Тогда у больного развились бы не только двигательные нарушения."
                },
                {
                    correct: "чувствительные",
                    symbol: "В",
                    result: null,
                    description:
                        "Это может быть в корешках правого лечевого сплетения и обоих поясничнокрестцовых сплетениях. Но и здесь, кроме двигательных, проходят …",
                    description_info:
                        "волокна, которые тоже должны были быть вовлечены в процесс, а у больного этого нет. "
                },
                {
                    correct: "двигательные",
                    symbol: "Г",
                    result: null,
                    description:
                        "Это может быть в передних корешках: ведь в них проходят только ...",
                    description_info: "волокна."
                },
                {
                    correct: "периферического двигательного",
                    symbol: "Д",
                    result: null,
                    description:
                        "Наконец, это может быть в передних рогах спинного мозга, где заложено начало ...",
                    description_info: "нейрона."
                },
                {
                    correct: "С5-С8",
                    symbol: "Е",
                    result: null,
                    description:
                        "Локализация по длиннику спинного мозга: периферический парез руки – значит процесс на уровне ..."
                },
                {
                    correct: "L1-S2",
                    symbol: "Ж",
                    result: null,
                    description:
                        "Периферический парез нижних конечностей говорит о поражении периферических нейронов на уровне…"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 53,
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

            return this.serverAnswers.find(x => x.question_index == "53");
        }
    }
};
</script>
