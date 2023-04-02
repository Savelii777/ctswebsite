<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
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
                        поражение шейногоутолщения (С5-С8). Это также сложная
                        задача.
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
                        :src="currentUrl + '/test-img/test30.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block" style="margin-left: 20px">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>ДАНО</b><br />
                            поражение шейногоутолщения (С5-С8). Это также
                            сложная задача.
                        </p>
                    </div>
                    <p class="compliance-txt">
                        А) Определите, будут ли нарушены произвольные движения
                        рук, ног.
                    </p>
                    <div class="radio test-radio">
                        <div>
                            <div
                                class="answer-item"
                                v-for="(item, index) in getAnswerList(0)"
                                :key="index"
                            >
                                <input
                                    :id="'v28-radio' + index"
                                    type="radio"
                                    name="radio28top"
                                    v-model="answer[0].result"
                                    :value="index"
                                />
                                <label
                                    :for="'v28-radio' + index"
                                    v-bind:class="{
                                        correct: topArrcorrect() == 1,
                                        incorrect: topArrcorrect() == 0
                                    }"
                                >
                                    {{ item.symbol }}. {{ item.description }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li
                            v-for="(item, index) in getAnswerList(1)"
                            :key="index"
                        >
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[item.order].result"
                                :disabled="serverAnswers"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[item.order].result,
                                            answer[item.order].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[item.order].result,
                                            answer[item.order].correct
                                        ) == 0
                                }"
                            />
                        </li>
                    </ul>
                    <p class="compliance-txt">
                        В) Сформулируйте синдромы параличей.
                    </p>
                    <div class="compliance-elem-add">
                        <div
                            :key="index"
                            class="compliance-elem-add__item"
                            v-for="(item, index) in groups"
                        >
                            <div class="squares-item__input">
                                <p class="test-txt">{{ index + 1 }}.</p>
                                <input
                                    type="text"
                                    v-model="groups[index]"
                                    class="test-input compliance-input"
                                    :disabled="serverAnswers"
                                    v-bind:class="{
                                        correct: correctGroups(item) == 1,
                                        incorrect: correctGroups(item) == 0
                                    }"
                                />
                            </div>
                            <div class="squares-item__btn">
                                <div
                                    :key="index"
                                    :transfer-data="{ item, example: 'groups' }"
                                >
                                    <button
                                        class="compliance-btn-remove"
                                        @click="remove(index, item)"
                                    >
                                        x
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button class="compliance-btn-add" @click.prevent="add">
                            Добавить
                        </button>
                    </div>
                    <p class="compliance-txt">
                        Г) Какая фигура человека иллюстрирует эту патологию?
                    </p>
                    <div class="test-description">
                        <div>
                            <img
                                :src="currentUrl + '/test-img/icon1.png'"
                                alt="courses"
                            />
                            <p>центральный паралич</p>
                        </div>
                        <div>
                            <img
                                :src="currentUrl + '/test-img/icon2.png'"
                                alt="courses"
                            />
                            <p>периферический паралич</p>
                        </div>
                    </div>
                    <div class="radio test-radio test-radio-img">
                        <ul>
                            <div class="row">
                                <li
                                    class="col-md-4 col-sm-6 col-6"
                                    v-for="(item, index) in getAnswerList(3)"
                                    :key="index"
                                >
                                    <input
                                        :id="'v28-radio-bot' + index"
                                        type="radio"
                                        name="radio28v"
                                        :value="index"
                                        v-model="answer[3].result"
                                        :disabled="serverAnswers"
                                    />
                                    <label
                                        :for="'v28-radio-bot' + index"
                                        v-bind:class="{
                                            correct: botArrcorrect() == 1,
                                            incorrect: botArrcorrect() == 0
                                        }"
                                    >
                                        {{ item.symbol }}.
                                    </label>
                                    <img
                                        class="compliance-img-answer"
                                        :src="currentUrl + '/' + item.img"
                                        alt="courses"
                                    />
                                </li>
                            </div>
                        </ul>
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
            this.answer = this.currentQuestionAnswers.answer;
            this.groups = this.currentQuestionAnswers.answer[2].result;
        }
    },
    data() {
        return {
            answers: [
                {
                    part: 0,
                    symbol: "1",
                    result: null,
                    description: "Да"
                },
                {
                    part: 0,
                    symbol: "2",
                    result: null,
                    description: "Нет"
                },
                {
                    part: 0,
                    symbol: "3",
                    result: null,
                    description: "Частично"
                },
                {
                    part: 1,
                    symbol: "Б",
                    description: " А что происходит с тазовыми органами?",
                    order: 1
                },
                {
                    part: 3,
                    symbol: "1",
                    result: null,
                    img: "test-img/man1.png"
                },
                {
                    part: 3,
                    symbol: "2",
                    result: null,
                    img: "test-img/man2.png"
                },
                {
                    part: 3,
                    symbol: "3",
                    result: null,
                    img: "test-img/man3.png"
                },
                {
                    part: 3,
                    symbol: "4",
                    result: null,
                    img: "test-img/man4.png"
                },
                {
                    part: 3,
                    symbol: "5",
                    result: null,
                    img: "test-img/man5.png"
                },
                {
                    part: 3,
                    symbol: "6",
                    result: null,
                    img: "test-img/man6.png"
                },
                {
                    part: 3,
                    symbol: "7",
                    result: null,
                    img: "test-img/man7.png"
                },
                {
                    part: 3,
                    symbol: "8",
                    result: null,
                    img: "test-img/man8.png"
                },
                {
                    part: 3,
                    symbol: "9",
                    result: null,
                    img: "test-img/man9.png"
                },
                {
                    part: 3,
                    symbol: "10",
                    result: null,
                    img: "test-img/man10.png"
                }
            ],
            currentUrl: "",
            //answer_groups: [],
            groups: [""],
            answer: [
                {
                    result: 0,
                    correct: 0
                },
                {
                    result: "",
                    correct: "Центральный паралич тазовых органов"
                },
                {
                    result: null,
                    correct: [
                        "Верхняя периферическая параплегия",
                        "Нижняя центральная параплегия"
                    ]
                },
                {
                    result: 0,
                    correct: 9
                }
            ]
        };
    },
    mounted() {
        //for (let i = 0; i < 20; i++) this.answer_groups.push("");
    },
    methods: {
        getAnswerList(part) {
            return this.answers.filter(item => item.part === part);
        },
        add() {
            this.groups.push("");
        },
        remove(index, item) {
            // let localIndex = null;
            // for (let i = 0; i < this.answer_groups.length; i++) {
            //     if (this.answer_groups[i] == index + 1) {
            //         this.answer_groups[i] = "";
            //     }
            // }
            this.groups.splice(index, 1);
        },
        correctGroups(item) {
            if (!this.serverAnswers) {
                return null;
            }

            let isFound = 0;

            this.answer[2].correct.forEach(element => {
                if (this.insensitiveSearch(item, element)) {
                    isFound = 1;
                }
            });

            return isFound;
        },
        topArrcorrect() {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.answer[0].result == this.answer[0].correct) {
                return 1;
            }

            return 0;
        },
        botArrcorrect() {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.answer[3].result == this.answer[3].correct) {
                return 1;
            }

            return 0;
        },
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
    watch: {
        groups: {
            handler: function(newVal, oldVal) {
                this.answer[2].result = this.groups;
                this.$emit("answer", {
                    question_index: 28,
                    answer: this.answer
                });
            },
            deep: true
        },
        answer: {
            handler: function(newVal, oldVal) {
                this.answer[2].result = this.groups;
                this.$emit("answer", {
                    question_index: 28,
                    answer: this.answer
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

            return this.serverAnswers.find(x => x.question_index == "28");
        }
    }
};
</script>
