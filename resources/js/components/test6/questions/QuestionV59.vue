<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-59 test-exercise-in-topical-diagnostic">
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
                        <b>Даны синдромы:</b>
                        <br />I. Нижний центральный монопарез справа. <br />II.
                        Проводниковая гипестезия поверхностной чувствительности
                        слева от Th8. <br />III.Проводниковая гипестезия
                        глубокой и сложной чувствительности справа от Th6.
                        <span><br /><b>Симптом:</b></span>
                        Сегментарная гипестезия в области Th6-Th7 справа.
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
                        :src="currentUrl + '/test-img/test52.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div
                        class="test-explanation test-explanation-desc test-explanation-diagnostics"
                    >
                        <p class="explanation-txt">
                            <b>Даны синдромы:</b>
                            <br />I. Нижний центральный монопарез справа.
                            <br />II. Проводниковая гипестезия поверхностной
                            чувствительности слева от Th8.
                            <br />III.Проводниковая гипестезия глубокой и
                            сложной чувствительности справа от Th6.
                            <span><br /><b>Симптом:</b></span>
                            Сегментарная гипестезия в области Th6-Th7 справа.
                        </p>
                    </div>

                    <div>
                        <div v-for="(item, index) in firstPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }} {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="firstPart[index].result"
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
                    <div>
                        <div v-for="(item, index) in secondPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }} {{ item.description }}
                            </p>
                        </div>
                    </div>
                    <ul>
                        <li v-for="(item, index) in thirdPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.subsymbol }}. {{ item.subdescription }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="thirdPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(item.result, item.correct) == 1,
                                    incorrect:
                                        correct(item.result, item.correct) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                    <div>
                        <div v-for="(item, index) in fourthPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }} {{ item.description }}
                            </p>
                        </div>
                    </div>
                    <ul>
                        <li v-for="(item, index) in fifthPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.subsymbol }}. {{ item.subdescription }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="fifthPart[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(item.result, item.correct) == 1,
                                    incorrect:
                                        correct(item.result, item.correct) == 0
                                }"
                                :readonly="serverAnswers"
                            />
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
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct:
                        "Симптом сегментарной гипестезии говорит о поражении Th6-Th7 сегментов задних рогов справа",
                    part: 0,
                    symbol: "А)",
                    result: null,
                    description:
                        "Какой симптом или синдромы прямо указывают на локализацию процесса?"
                },
                {
                    correct: " ",
                    part: 1,
                    symbol: "Б)",
                    result: " ",
                    description:
                        "Рис. 1 Укажите локализацию процесса, поражающего проводники глубокой и сложной чувствительности (синдром III):"
                },
                {
                    correct: "Th6",
                    part: 2,
                    subsymbol: "1",
                    result: null,
                    subdescription: " Уровень поражения;"
                },
                {
                    correct: "Справа",
                    part: 2,
                    subsymbol: "2",
                    result: null,
                    subdescription: " Сторона;"
                },
                {
                    correct: "Задние столбы",
                    part: 2,
                    subsymbol: "3",
                    result: null,
                    subdescription:
                        " Локализация процесса в поперечнике спинного мозга;"
                },
                {
                    correct: " ",
                    part: 3,
                    symbol: "В)",
                    result: " ",
                    description: "Рис. 2 I синдром обусловлен поражением:"
                },
                {
                    correct: "Пирамидного",
                    part: 4,
                    subsymbol: "1",
                    result: null,
                    subdescription: " Какого пути?"
                },
                {
                    correct: "Справа",
                    part: 4,
                    subsymbol: "2",
                    result: null,
                    subdescription: " На какой стороне?"
                },
                {
                    correct: "Th6-Th7",
                    part: 4,
                    subsymbol: "3",
                    result: null,
                    subdescription: " На каком уровне?"
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
        thirdPart() {
            return this.answers.filter(item => item.part === 2);
        },
        fourthPart() {
            return this.answers.filter(item => item.part === 3);
        },
        fifthPart() {
            return this.answers.filter(item => item.part === 4);
        },
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "59");
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 59,
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
