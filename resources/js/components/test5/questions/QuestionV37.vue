<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
        </div>
        <div class="test-main test-types-of-sensitivity-disorders">
            <div class="test-caption">
                <p>
                    Пять типов нарушения чувствительности
                    <span>
                    Допишите пропущенное:
                </span>
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
                        :src="currentUrl + '/test-img/test11.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
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
                    correct: "периферической",
                    symbol: "А",
                    result: null,
                    description:
                        "При поражении периферического нерва развивается анестезия, называемая"
                },
                {
                    correct: "корешковой",
                    symbol: "Б",
                    result: null,
                    description:
                        "При поражении задних корешков спинного мозга развивается анестезия, называемая"
                },
                {
                    correct: "сегментарной",
                    symbol: "В",
                    result: null,
                    description:
                        "При поражении сегментарного аппарата спинного мозга (его задних рогов) иразвивается анестезия, называемая"
                },
                {
                    correct: "проводниковой",
                    symbol: "Г",
                    result: null,
                    description:
                        "При поражении проводящего аппарата спинного мозга (его чувствительных проводников) развивается анестезия, называемая"
                },
                {
                    correct: "центральной",
                    symbol: "Д",
                    result: null,
                    description:
                        "При поражении чувствительных путей в головном мозге развивается анестезия, называемая"
                }
            ]
        };
    },
    watch: {
        answers: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 37,
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

            return this.serverAnswers.find(x => x.question_index == "37");
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
