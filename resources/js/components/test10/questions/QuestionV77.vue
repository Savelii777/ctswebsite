<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-77 test-exercise-in-topical-diagnostic">
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
                        на схеме указаны девять патологических очагов<br />
                        <b class="last"
                            >Определите синдромы нарушений чувствительности
                            лица, проставив под каждым рисунком в нижней части
                            карты соответствующий номер (или несколько
                            номеров).</b
                        ><br />
                        <b class="last">Совет</b>
                        на схеме указаны девять патолов учебнике обратите
                        внимание на тот раздел, в котором говорится о физиологии
                        желатинозной субстанции (substantia gelatinosa Rolandi)
                        и о сегментарной анестезии лица.гических очагов
                        <br />
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
                        :src="currentUrl + '/test-img/test65.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>ДАНО</b><br />
                            на схеме указаны девять патологических очагов<br />
                            <b class="last"
                                >Определите синдромы нарушений чувствительности
                                лица, проставив под каждым рисунком в нижней
                                части карты соответствующий номер (или несколько
                                номеров).</b
                            ><br />
                            <b class="last">Совет</b>
                            на схеме указаны девять патолов учебнике обратите
                            внимание на тот раздел, в котором говорится о
                            физиологии желатинозной субстанции (substantia
                            gelatinosa Rolandi) и о сегментарной анестезии
                            лица.гических очагов
                            <br />
                        </p>
                    </div>
                    <ul class="compliance-list row">
                        <li
                            v-for="(item, index) in answers"
                            class="col-md-4 col-6 compliance__item-input"
                            :key="index"
                        >
                            <div>
                                <p class="test-txt">{{ item.symbol }})</p>
                                <input
                                    type="text"
                                    class="test-input compliance-input small-inputs"
                                    v-model="answers[index].result"
                                    v-bind:class="{
                                        correct:
                                            correct(
                                                answers[index].result,
                                                answers[index].correct
                                            ) == 1,
                                        incorrect:
                                            correct(
                                                answers[index].result,
                                                answers[index].correct
                                            ) == 0
                                    }"
                                    :readonly="serverAnswers"
                                />
                            </div>
                            <div>
                                <img
                                    class="compliance-img-answer"
                                    :src="currentUrl + '/' + item.img"
                                    alt="courses"
                                />
                            </div>
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
                    correct: "1",
                    symbol: "А",
                    result: null,
                    img: "test-img/test65(1).png"
                },
                {
                    correct: "2",
                    symbol: "Б",
                    result: null,
                    img: "test-img/test65(2).png"
                },
                {
                    correct: "3",
                    symbol: "В",
                    result: null,
                    img: "test-img/test65(3).png"
                },
                {
                    correct: "4, 8, 9",
                    symbol: "Г",
                    result: null,
                    img: "test-img/test65(4).png"
                },
                {
                    correct: "7",
                    symbol: "Д",
                    result: null,
                    img: "test-img/test65(5).png"
                },
                {
                    correct: "5",
                    symbol: "Е",
                    result: null,
                    img: "test-img/test65(6).png"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 77,
                    answer: this.answers
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

            return this.serverAnswers.find(x => x.question_index == "77");
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
