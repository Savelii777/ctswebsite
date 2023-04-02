<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div
            class="test-main test-higher-cortical-functions-and-their-pathologies"
        >
            <div class="test-caption">
                <p>
                    Цитоархитектонические поля (по Бродману).<br />Левое доминантное
                    полушарие
                </p>
                <div class="test-number number" style="width: 100%;">
                    <b>Карточка книги <span style="font-weight: 700; display: inline;">№{{ number }}</span></b>
                </div>
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
            <div class="test-compliance">
                <div class="compliance-img">
                    <img
                        :src="currentUrl + '/test-img/test70.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation">
                        <p class="explanation-txt">
                            <b
                                >Укажите физиологическое значение полей левого
                                полушария:</b
                            >
                        </p>
                    </div>
                    <div>
                        <div class="test-explanation">
                            <p class="explanation-txt">
                                <b class="last">В лобной области: </b>
                            </p>
                        </div>
                        <ul>
                            <li
                                class="answer-item"
                                v-for="(item, index) in firstPart"
                                :key="index"
                            >
                                <p class="compliance-txt">
                                    {{ item.symbol }}) {{ item.description }}
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
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="test-explanation">
                            <p class="explanation-txt">
                                <b class="last">В височной области:</b>
                            </p>
                        </div>
                        <ul>
                            <li
                                class="answer-item"
                                v-for="(item, index) in secondPart"
                                :key="index"
                            >
                                <p class="compliance-txt">
                                    {{ item.symbol }}) {{ item.description }}
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
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="test-explanation">
                            <p class="explanation-txt">
                                <b class="last">В затылочной области: </b>
                            </p>
                        </div>
                        <ul>
                            <li
                                class="answer-item"
                                v-for="(item, index) in thirdPart"
                                :key="index"
                            >
                                <p class="compliance-txt">
                                    {{ item.symbol }}) {{ item.description }}
                                </p>
                                <input
                                    type="text"
                                    class="test-input compliance-input"
                                    v-model="thirdPart[index].result"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                thirdPart[index].result,
                                                thirdPart[index].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                thirdPart[index].result,
                                                thirdPart[index].correct
                                            ) == 0
                                    }"
                                    :readonly="serverAnswers"
                                />
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="test-explanation">
                            <p class="explanation-txt">
                                <b class="last">В теменной области:</b>
                            </p>
                        </div>
                        <ul>
                            <li
                                class="answer-item"
                                v-for="(item, index) in fouthPart"
                                :key="index"
                            >
                                <p class="compliance-txt">
                                    {{ item.symbol }}) {{ item.description }}
                                </p>
                                <input
                                    type="text"
                                    class="test-input compliance-input"
                                    v-model="fouthPart[index].result"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                fouthPart[index].result,
                                                fouthPart[index].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                fouthPart[index].result,
                                                fouthPart[index].correct
                                            ) == 0
                                    }"
                                    :readonly="serverAnswers"
                                />
                            </li>
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
        if (this.currentQuestionAnswers) {
            this.answers = this.currentQuestionAnswers.answer;
        }
    },
    data() {
        return {
            answers: [
                {
                    correct: "двигательная зона коры",
                    part: 0,
                    symbol: "А",
                    result: null,
                    description: " поля 4 и 6 "
                },
                {
                    correct: "центр моторной речи Брока",
                    part: 0,
                    symbol: "Б",
                    result: null,
                    description: " поле 44"
                },
                {
                    correct: "слуховая область",
                    part: 1,
                    symbol: "В",
                    result: null,
                    description: " поле 41  "
                },
                {
                    correct: "центр сенсорной речи Вернике",
                    part: 1,
                    symbol: "Г",
                    result: null,
                    description: " поле 22"
                },
                {
                    correct: "мнестический центр речи",
                    part: 1,
                    symbol: "Д",
                    result: null,
                    description: " поле 37"
                },
                {
                    correct: "зрительная область",
                    part: 2,
                    symbol: "Е",
                    result: null,
                    description: " поля 17, 18 и 19"
                },
                {
                    correct: "корковые центры чувствительности",
                    part: 3,
                    symbol: "Ж",
                    result: null,
                    description: " поля 3, 1, 2, 5 и 7"
                },
                {
                    correct:
                        "центр управления сложными произвольными движениями (praxis’a)",
                    part: 3,
                    symbol: "З",
                    result: null,
                    description: " поле 40"
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
        fouthPart() {
            return this.answers.filter(item => item.part === 3);
        },
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "89");
        }
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 89,
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
