<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-main-49 test-exercise-in-topical-diagnostic">
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
                        <b>Внимательно прочитайте синдромы:</b>
                        <br />I. Корешковые боли в зоне L5 и S1 справа.
                        <br />II. Корешковая гипестезия в зоне L5 и S1 справа.
                        <br />III. Периферический парез мышц задней группы
                        бедра, голени и ягодицы справа.
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
                        :src="currentUrl + '/test-img/test47.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div
                        class="test-explanation test-explanation-diagnostics test-explanation-desc"
                    >
                        <p class="explanation-txt">
                            <b>Внимательно прочитайте синдромы:</b>
                            <br />I. Корешковые боли в зоне L5 и S1 справа.
                            <br />II. Корешковая гипестезия в зоне L5 и S1
                            справа. <br />III. Периферический парез мышц задней
                            группы бедра, голени и ягодицы справа.
                        </p>
                    </div>
                    <div v-for="(item, index) in answers" :key="index">
                        <p class="compliance-txt">
                            {{ item.symbol }}) {{ item.description }}
                            <span>{{ item.description_info }}</span>
                            <span>{{ item.description_info_1 }}</span>
                            <span>{{ item.description_info_2 }}</span>
                            <span>{{ item.description_info_3 }}</span>
                            <span>{{ item.description_info_4 }}</span>
                            <span>{{ item.description_info_5 }}</span>
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
                    correct: "Синдромы I и II",
                    symbol: "А",
                    result: null,
                    description:
                        "Какие из этих синдромов прямо говорят о локализации процесса? ",
                    description_info:
                        "Ответив на первый вопрос, рассмотрите патогенез симптомов, из которых составлен синдром корешковых болей:",
                    description_info_1:
                        "1. Стреляющие боли в пояснице справа, иррадиирующие по задней поверхности правой ноги в пятку и III-V пальцы",
                    description_info_2:
                        "2. Эти боли усиливаются при наклоне туловища вправо.",
                    description_info_3:
                        "3. Выражены симптомы Нери и Дежерина справа.",
                    description_info_4:
                        "4. Болезненны паравертебральные точки L5 и S1 справа.",
                    description_info_5: "5. При ходьбе щадит правую ногу."
                },
                {
                    correct: "Нет",
                    symbol: "Б",
                    result: null,
                    description:
                        "Нельзя ли предположить очаг раздраженияв области крестцового сплетения справа?",
                    description_info:
                        "III синдром периферического пареза мышц указывает на поражение периферических двигательных нейронов для этих мышц. Рассмотрите внимательно схему образования корешков крестцового сплетения в приложении к этой карте, где двигательные нейроны обозначены пунктирной линией, и ответьте на следующий вопрос."
                },
                {
                    correct: "В корешках L5-S1",
                    symbol: "В",
                    result: null,
                    description:
                        "Где именно поражены двигательные нейроны: на уровне двигательных спинномозговых корешков? Или в крестцовом сплетении? Или в стволе седалищного нерва?",
                    description_info: null
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 49,
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

            return this.serverAnswers.find(x => x.question_index == "49");
        }
    }
};
</script>
