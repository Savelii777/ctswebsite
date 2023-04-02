<template>
    <div class="test-block">
        <div class="test-number number">
            {{ordinalNumber}} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-exercise-in-topical-diagnostics">
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
                        <b>ДАНО</b><br />
                        у больного – полное поперечное поражение спинного мозга
                        на уровне Th9-Th10.
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
                        :src="currentUrl + '/test-img/test4.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block" style="padding-left:5%">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>ДАНО</b><br />
                            у больного – полное поперечное поражение спинного
                            мозга на уровне Th9-Th10.
                        </p>
                    </div>
                    <p class="explanation-txt">
                        <span>Укажите что с рефлексами:</span>
                    </p>
                    <p class="compliance-txt">
                        А) На руках
                    </p>
                    <ul
                        class="radio test-radio"
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
                    >
                        <div>
                            <li :key="index" v-for="(item, index) in hands">
                                <input
                                    :id="item.name"
                                    type="radio"
                                    :value="index + 1"
                                    :name="item.name"
                                    v-model="answers[0].result"
                                    :disabled="serverAnswers"
                                />
                                <label :for="item.name">
                                    <span>{{ index + 1 }}.</span>
                                    {{ item.description }}
                                </label>
                            </li>
                        </div>
                    </ul>
                    <p class="compliance-txt">
                        Б) С верхними брюшными
                    </p>
                    <ul
                        class="radio test-radio"
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
                    >
                        <div>
                            <li :key="index" v-for="(item, index) in legs">
                                <input
                                    :id="item.name"
                                    type="radio"
                                    :value="index + 1"
                                    :name="item.name"
                                    v-model="answers[1].result"
                                    :disabled="serverAnswers"
                                />
                                <label :for="item.name">
                                    <span>{{ index + 1 }}.</span>
                                    {{ item.description }}
                                </label>
                            </li>
                        </div>
                    </ul>
                    <p class="compliance-txt">
                        В) Со средними брюшными
                    </p>
                    <ul
                        class="radio test-radio"
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
                    >
                        <div>
                            <li :key="index" v-for="(item, index) in legs2">
                                <input
                                    :id="item.name"
                                    type="radio"
                                    :value="index + 1"
                                    :name="item.name"
                                    v-model="answers[2].result"
                                    :disabled="serverAnswers"
                                />
                                <label :for="item.name">
                                    <span>{{ index + 1 }}.</span>
                                    {{ item.description }}
                                </label>
                            </li>
                        </div>
                    </ul>
                    <p class="compliance-txt">
                        Г) С нижними брюшными
                    </p>
                    <ul
                        class="radio test-radio"
                        v-bind:class="{
                            correct:
                                correct(
                                    answers[3].result,
                                    answers[3].correct
                                ) == 1,
                            incorrect:
                                correct(
                                    answers[3].result,
                                    answers[3].correct
                                ) == 0
                        }"
                    >
                        <div>
                            <li :key="index" v-for="(item, index) in legs3">
                                <input
                                    :id="item.name"
                                    type="radio"
                                    :value="index + 1"
                                    :name="item.name"
                                    v-model="answers[3].result"
                                    :disabled="serverAnswers"
                                />
                                <label :for="item.name">
                                    <span>{{ index + 1 }}.</span>
                                    {{ item.description }}
                                </label>
                            </li>
                        </div>
                    </ul>
                    <p class="compliance-txt">
                        Д) С коленными и ахилловыми
                    </p>
                    <ul
                        class="radio test-radio"
                        v-bind:class="{
                            correct:
                                correct(
                                    answers[4].result,
                                    answers[4].correct
                                ) == 1,
                            incorrect:
                                correct(
                                    answers[4].result,
                                    answers[4].correct
                                ) == 0
                        }"
                    >
                        <div>
                            <li :key="index" v-for="(item, index) in legs4">
                                <input
                                    :id="item.name"
                                    type="radio"
                                    :value="index + 1"
                                    :name="item.name"
                                    v-model="answers[4].result"
                                    :disabled="serverAnswers"
                                />
                                <label :for="item.name">
                                    <span>{{ index + 1 }}.</span>
                                    {{ item.description }}
                                </label>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        ordinalNumber: {
            type: String,
            default: "01"
        },
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
                    result: 1,
                    correct: 1
                },
                {
                    result: 1,
                    correct: 1
                },
                {
                    result: 1,
                    correct: 4
                },
                {
                    result: 1,
                    correct: 4
                },
                {
                    result: 1,
                    correct: 2
                }
            ],
            hands: [
                {
                    name: "question14t1",
                    description: "В норме"
                },
                {
                    name: "question14t2",
                    description: "Повышены"
                },
                {
                    name: "question14t3",
                    description: "Понижены"
                },
                {
                    name: "question14t4",
                    description: "Отсуствуют"
                }
            ],
            legs: [
                {
                    name: "question14b1",
                    description: "В норме"
                },
                {
                    name: "question14b2",
                    description: "Повышены"
                },
                {
                    name: "question14b3",
                    description: "Понижены"
                },
                {
                    name: "question14b4",
                    description: "Отсуствуют"
                }
            ],
            legs2: [
                {
                    name: "question14b11",
                    description: "В норме"
                },
                {
                    name: "question14b12",
                    description: "Повышены"
                },
                {
                    name: "question14b13",
                    description: "Понижены"
                },
                {
                    name: "question14b14",
                    description: "Отсуствуют"
                }
            ],
            legs3: [
                {
                    name: "question14b21",
                    description: "В норме"
                },
                {
                    name: "question14b22",
                    description: "Повышены"
                },
                {
                    name: "question14b23",
                    description: "Понижены"
                },
                {
                    name: "question14b24",
                    description: "Отсуствуют"
                }
            ],
            legs4: [
                {
                    name: "question14b31",
                    description: "В норме"
                },
                {
                    name: "question14b32",
                    description: "Повышены"
                },
                {
                    name: "question14b33",
                    description: "Понижены"
                },
                {
                    name: "question14b34",
                    description: "Отсуствуют"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 15,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    methods: {
        correct(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (answer === correct) {
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

            return this.serverAnswers.find(x => x.question_index == "15");
        }
    }
};
</script>
