<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-70 test-exercise-in-topical-diagnostic">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
            </div>
            <div class="test-compliance">
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
                        :src="currentUrl + '/test-img/test61.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            <b class="blue">Задание 1</b><br />
                            <b>Дано:</b><br />
                            Патологический процесс в левом полушарии поражает
                            переднюю центральную извилину (двигательные центры)
                            и центр взора в коре.
                        </p>
                    </div>
                    <div>
                        <p class="compliance-txt">
                            А) Вопросы:
                        </p>
                        <div v-for="(item, index) in firstPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}. {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="firstPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            firstPart[index].result,
                                            firstPart[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            firstPart[index].result,
                                            firstPart[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </div>
                    </div>
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            <b class="blue last">Задание 2</b>
                            <b>Дано:</b><br />
                            Патологический очаг располагается в виролиевом мосту
                            справа (см. схему) и поражает центр взора и
                            проходящий здесь пирамидный путь (представьте себе
                            его).
                        </p>
                    </div>
                    <div>
                        <p class="compliance-txt">
                            Б) Вопросы:
                        </p>
                        <div v-for="(item, index) in secondPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}. {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="secondPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            secondPart[index].result,
                                            secondPart[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            secondPart[index].result,
                                            secondPart[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
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
            answers: [
                {
                    correct: "справа",
                    part: 0,
                    symbol: "1",
                    result: null,
                    description: "На какой стороне разовьется паралич взора?"
                },
                {
                    correct: "справа",
                    part: 0,
                    symbol: "2",
                    result: null,
                    description: "А паралич конечностей?"
                },
                {
                    correct: "справа",
                    part: 1,
                    symbol: "1",
                    result: null,
                    description:
                        "У этого больного разовьется паралич взора… (где?)."
                },
                {
                    correct: "слева",
                    part: 1,
                    symbol: "2",
                    result: null,
                    description:
                        "А теперь вспомните, куда дальше направляется пирамидный путь и какие конечности он иннервирует (карта 17)."
                },
                {
                    correct: "слева",
                    part: 1,
                    symbol: "3",
                    result: null,
                    description:
                        "На какой стороне у этого больного будет паралич конечностей?"
                }
            ]
        };
    },
    computed: {
        firstPart() {
            return this.answers.filter(item => item.part === 0);
        },
        secondPart() {
            return this.answers.filter(item => item.part === 1);
        },
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "70");
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 70,
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
    }
};
</script>
