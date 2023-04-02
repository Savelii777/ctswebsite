<template>
    <div class="test-block">
        <div class="test-number number" style="min-width: 60px;">
            {{ ordinalNumber }} <b>/ {{ questions }}</b>
        </div>
        <div class="test-main test-main-60 test-brown-secar-syndrome">
            <div class="test-caption">
                <p>
                    Синдром Броун-Секара
                    <b>(продолжение карты 59)</b>
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
                        <b
                        >Итак, вырисовывается патологический очаг в правой
                            половине спинного мозга на уровне Th6-Th7.</b
                        >
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
                        style="max-width: 100%;"
                        :src="currentUrl + '/test-img/test53.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div
                        class="test-explanation test-explanation-desc test-explanation-diagnostics"
                    >
                        <p class="explanation-txt">
                            <b
                            >Итак, вырисовывается патологический очаг в
                                правой половине спинного мозга на уровне
                                Th6-Th7.</b
                            >
                        </p>
                    </div>
                    <div>
                        <div>
                            <p class="compliance-txt">
                                {{ firstPart[0].symbol }})
                                {{ firstPart[0].description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input mb-2"
                                v-model="firstPart[0].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            firstPart[0].result,
                                            firstPart[0].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            firstPart[0].result,
                                            firstPart[0].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="firstPart[1].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            firstPart[1].result,
                                            firstPart[1].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            firstPart[1].result,
                                            firstPart[1].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </div>
                    </div>
                    <div>
                        <div v-for="(item, index) in secondPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}
                            </p>
                        </div>
                    </div>
                    <ul>
                        <li v-for="(item, index) in thirdPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}
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
                                {{ item.symbol }}. {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="fourthPart[index].result"
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
                    correct: "с правой",
                    part: 0,
                    symbol: "А",
                    result: null,
                    description:
                        "Попытайтесь теперь оставшийся синдром проводниковой гипестезии поверхностной чувствительности слева объяснить той же локализацией процесса. Для этого рассмотрите рис. 1 приложения к карте №60, а затем напишите на бумаге следующую фразу, дополняя пропущенное: «Проводники поверхностной чувствительности от левой половины тела проходят в боковом столбе спинного мозга с… (какой?) стороны, при их поражении проводниковая анестезия или гипестезия этих видов чувствительности будет … (с какой стороны?)."
                },
                {
                    correct: "с левой",
                    part: 0,
                    symbol: "",
                    result: null,
                    description: ""
                },
                {
                    part: 1,
                    symbol: "Б",
                    result: null,
                    description:
                        "Рассмотрите, как происходит перекрест спинно-таламического пути на рис. 2 приложения к карте №60, и ответьте на вопросы (письменно):"
                },
                {
                    correct: "Th6",
                    part: 2,
                    symbol: "1",
                    result: null,
                    description:
                        "На уровне какого сегмента заканчивают перекрест нейроны спинно-таламического пути от Th8?"
                },
                {
                    correct:
                        "Все нейроны, идущие слева от сегментов Th8 и всех нижерасположенных",
                    part: 2,
                    symbol: "2",
                    result: null,
                    description:
                        "Назовите, от каких сегментов происходят нейроны, входящие в состав спинно-таламического пути на уровне Th6"
                },
                {
                    correct:
                        "Боковой столб спинного мозга на уровне Th6 справа",
                    part: 2,
                    symbol: "3",
                    result: null,
                    description:
                        "Если у больного выявлена проводниковая гипестезия поверхностной чувствительности слева от уровня Th8 (см. зону гипестезии на фигурах человека), то где следует искать патологический очаг?"
                },
                {
                    part: 3,
                    correct:
                        "Поражение задних столбов, задних рогов, пирамидного и спинноталамического путей бокового столба спинного мозга справа на уровне Th6-Th7",
                    symbol: "В",
                    result: null,
                    description:
                        "Еще раз рассмотрите все синдромы, выявленные у больного, и сформулируйте топический диагноз."
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
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "60");
        }
    },
    watch: {
        answers: {
            handler: function (newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 60,
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
