<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-course-of-the-first-neurons">
            <div class="test-caption">
                <p>
                    Упражнение в топической диагностике
                    <span>
                    Рассмотрите рисунок и опишите ход первых нейронов
                    поверхностной (<img
                        :src="currentUrl + '/test-img/icon3.png'"
                        alt="courses"
                    />) и глубокой (<img
                        :src="currentUrl + '/test-img/icon4.png'"
                        alt="courses"
                    />) чувствительностей в порядке нумерации этапов пути на
                    схеме. Отметьте для себя, где они проходят вместе.
                </span>
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
                        :src="currentUrl + '/test-img/test10.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <p class="compliance-txt">
                        А) Нейрон поверхностной <br/>чувствительности
                    </p>
                    <ul class="compliance-list">
                        <li v-for="(item, index) in firstPart" :key="index">
                            <p class="test-txt">{{ item.symbol }}.</p>
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
                        </li>
                    </ul>
                    <p class="compliance-txt">
                        Б) Нейрон глубокой и сложной <br/>чувствительности
                    </p>
                    <ul class="compliance-list">
                        <li v-for="(item, index) in secondPart" :key="index">
                            <p class="test-txt">{{ item.symbol }}.</p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="secondPart[index].result"
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
                    correct: "Рецепторы",
                    part: 0,
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Периферический нерв",
                    part: 0,
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Спинальный ганглий",
                    part: 0,
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Задний корешок",
                    part: 0,
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Задний рог спинного мозга",
                    part: 0,
                    symbol: "6",
                    result: null
                },

                {
                    correct: "Рецепторы",
                    part: 1,
                    symbol: "1",
                    result: null
                },
                {
                    correct: "Периферический нерв",
                    part: 1,
                    symbol: "2",
                    result: null
                },
                {
                    correct: "Спинальный ганглий",
                    part: 1,
                    symbol: "3",
                    result: null
                },
                {
                    correct: "Задний корешок",
                    part: 1,
                    symbol: "4",
                    result: null
                },
                {
                    correct: "Задние столбы спинного мозга",
                    part: 1,
                    symbol: "5",
                    result: null
                },
                {
                    correct: "Продолговатый мозг",
                    part: 1,
                    symbol: "7",
                    result: null
                }
            ]
        };
    },
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "33");
        },
        firstPart() {
            return this.answers.filter(item => item.part === 0);
        },
        secondPart() {
            return this.answers.filter(item => item.part === 1);
        }
    },
    watch: {
        answers: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 33,
                    answer: this.answers
                });
            },
            deep: true
        }
    },
    methods: {
        insensitiveSearch(str1, str2) {
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
