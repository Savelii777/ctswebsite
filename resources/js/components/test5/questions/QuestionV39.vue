<template>
    <div class="test-block">
        <div class="test-number number">
            {{ ordinalNumber }} <b>/   {{ questions }}</b>
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
                        <b>Дано:</b><br />
                        патологический процесс в левой внутренней
                        капсуле(capsula interna).
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
                        :src="currentUrl + '/test-img/test91.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block" style="margin-left:20px">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br />
                            патологический процесс в левой внутренней
                            капсуле(capsula interna).
                        </p>
                    </div>
                    <ul>
                        <li :key="index" v-for="(item, index) in firstPart">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[0].result"
                                :readonly="serverAnswers"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[0].result,
                                            answer[0].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[0].result,
                                            answer[0].correct
                                        ) == 0
                                }"
                            />
                        </li>
                    </ul>
                    <p class="compliance-txt">
                        Б) Зачертите территорию распространения анестезии на
                        фигуре человека.
                    </p>
                    <div id="stage-parent39">
                        <div v-if="!completed" id="question_39"></div>
                        <div v-if="completed" id="question_39">
                            <img
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[2].result,
                                            answer[2].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[2].result,
                                            answer[2].correct
                                        ) == 0
                                }"
                                :src="currentUrl + '/test-img/answer39.png'"
                                alt="courses"
                            />
                        </div>
                    </div>
                    <p class="compliance-txt">
                        В) Все ли виды чувствительности здесь нарушены?
                        <span>
                            <img
                                :src="currentUrl + '/test-img/icon3.png'"
                                alt="courses"
                            />
                            поверхностная
                            <img
                                :src="currentUrl + '/test-img/icon4.png'"
                                alt="courses"
                            />
                            глубокая и сложная
                        </span>
                    </p>
                    <div class="radio test-radio">
                        <div>
                            <div
                                class="answer-item"
                                v-for="(item, index) in secondPart"
                                :key="index"
                            >
                                <input
                                    :id="'v39-radio' + index"
                                    type="radio"
                                    name="radio39v"
                                    :value="index"
                                    v-model="answer[1].result"
                                    :disabled="serverAnswers"
                                />
                                <label
                                    :for="'v39-radio' + index"
                                    v-bind:class="{
                                        correct:
                                            correctTest(
                                                answer[1].result,
                                                answer[1].correct
                                            ) == 1,
                                        incorrect:
                                            correctTest(
                                                answer[1].result,
                                                answer[1].correct
                                            ) == 0
                                    }"
                                >
                                    {{ item.symbol }}. {{ item.description }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage39 = null;
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
        completed: {
            type: Boolean
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
    data() {
        return {
            currentUrl: "",
            etalon: "a path piece 0",
            testPass: false,
            answerList: [],
            answers: [
                {
                    part: 0,
                    symbol: "А",
                    description: " Укажите тип нарушения чувствительности.",
                    result: null
                },
                {
                    part: 2,
                    symbol: "1",
                    result: null,
                    description: "Да"
                },
                {
                    part: 2,
                    symbol: "2",
                    result: null,
                    description: "Нет"
                }
            ],
            answer: [
                {
                    result: "",
                    correct: "правосторонняя гемианестезия"
                },
                {
                    result: 0,
                    correct: 0
                },
                {
                    result: "",
                    correct: "a path piece 0"
                }
            ],
            body39: [
                "M 83.01,236.77 C 79.14,237.49 74.25,230.33 71.00,228.00 77.98,236.25 81.98,236.06 82.00,247.00 82.03,260.75 82.50,271.24 80.25,285.00 78.77,294.02 74.68,302.78 75.04,312.00 75.04,312.00 76.63,330.00 76.63,330.00 76.21,338.38 74.95,346.75 73.39,355.00 73.39,355.00 70.89,367.00 70.89,367.00 70.89,367.00 70.13,382.00 70.13,382.00 70.71,386.52 73.59,400.01 72.42,403.87 71.96,405.38 71.25,406.39 69.72,406.94 67.24,407.83 55.61,406.04 53.75,404.18 49.92,400.32 56.48,387.59 57.71,383.00 61.13,370.25 52.67,349.10 53.01,334.00 53.01,334.00 55.00,308.00 55.00,308.00 55.00,308.00 49.00,256.00 49.00,256.00 48.80,238.39 49.30,234.32 52.42,217.00 54.61,204.86 57.98,191.29 58.00,179.00 58.00,179.00 58.00,153.00 58.00,153.00 57.99,145.98 57.45,135.02 54.00,129.00 53.11,134.49 54.29,143.32 54.92,149.00 54.92,149.00 54.92,168.00 54.92,168.00 54.98,180.37 51.61,181.90 47.42,193.00 42.30,206.58 39.33,217.42 31.17,230.00 26.42,237.31 29.43,239.56 26.16,246.00 21.38,255.42 9.92,256.82 3.00,249.00 10.90,246.15 12.71,243.25 14.00,235.00 9.68,236.04 7.86,236.50 4.00,234.00 7.11,232.54 17.44,225.78 18.98,222.96 18.98,222.96 23.13,200.00 23.13,200.00 27.40,182.75 31.75,184.93 32.00,163.00 32.00,163.00 33.00,150.00 33.00,150.00 33.16,135.89 31.23,119.80 38.35,107.00 42.68,99.20 50.35,93.25 58.00,88.87 64.01,85.43 71.89,82.82 74.91,75.99 77.23,70.76 76.36,63.41 74.69,58.25 71.75,52.75 70.00,49.62 70.00,49.62 70.00,49.62 66.02,45.63 66.00,32.00 65.97,15.46 69.83,6.13 88.18,1.81 88.09,13.63 83.05,233.52 83.01,236.77 Z",
                "M 88.15,1.82 C 105.06,1.73 107.55,11.82 109.38,26.38 109.38,34.38 107.75,40.12 105.50,45.38 103.25,50.62 100.50,53.12 97.88,58.75 97.25,65.12 95.88,66.75 99.75,76.12 105.25,83.50 115.62,85.50 127.38,97.50 140.62,108.75 139.25,160.75 139.25,175.12 146.88,189.50 150.25,214.25 151.25,219.50 152.25,224.75 159.25,232.38 166.75,234.75 164.88,237.88 156.38,233.00 156.50,235.38 156.62,237.75 158.50,242.00 161.75,247.00 162.25,251.25 159.62,259.62 154.12,256.88 148.62,254.12 145.62,250.50 144.12,244.12 142.62,237.75 144.75,228.75 143.00,225.12 142.00,221.25 125.88,200.00 124.38,189.00 123.00,179.62 119.12,174.50 116.25,164.75 114.75,155.38 116.00,153.25 115.50,146.62 115.00,140.00 116.75,140.12 114.12,130.75 112.00,136.12 109.62,143.38 108.50,153.25 108.75,164.38 108.75,165.88 108.12,178.38 110.50,190.62 110.38,190.25 113.62,212.75 119.50,235.38 114.75,248.12 115.50,254.12 115.38,277.25 106.50,278.12 108.62,309.62 110.50,321.75 109.00,310.88 111.38,333.38 113.75,355.88 106.62,375.50 107.75,382.38 108.88,389.25 111.75,400.38 107.50,404.12 103.25,407.88 95.25,406.75 90.62,406.62 87.62,407.50 88.38,406.50 88.62,403.00 91.00,393.88 91.38,393.75 93.62,382.62 91.25,370.75 94.88,371.25 95.12,366.88 95.38,362.50 93.75,360.12 92.38,355.12 91.00,350.12 88.50,340.38 88.75,330.50 89.00,320.62 89.50,323.25 90.75,312.62 92.00,302.00 88.38,288.75 86.25,284.50 84.12,280.25 85.75,259.38 84.88,247.12 85.00,234.62 89.62,234.88 94.75,228.12 90.12,233.00 83.00,236.77 83.00,236.77 83.00,236.77 88.09,15.35 88.15,1.82 Z"
            ],
            colorRect: "",
            question_39Width: 367,
            question_39Height: 430
        };
    },
    computed: {
        firstPart() {
            return this.answers.filter(item => item.part === 0);
        },
        secondPart() {
            return this.answers.filter(item => item.part === 2);
        },
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "39");
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
        },
        correctTest(answer, correct) {
            if (!this.serverAnswers) {
                return null;
            }

            if (answer === correct) {
                return 1;
            }

            return 0;
        },
        getRandomColor() {
            var letters = "0123456789ABCDEF";
            var color = "#";
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        },
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent39");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            var scale = 0.8;

            stage39.width(this.question_39Width * scale);
            stage39.height(this.question_39Height * scale);
            stage39.scale({
                x: scale,
                y: scale
            });
            stage39.draw();
        },

        onStart() {
            const self = this;
            stage39 = new Konva.Stage({
                container: "question_39",
                width: this.question_39Width,
                height: this.question_39Height
            });
            var templayer39 = new Konva.Layer();
            var layer39 = new Konva.Layer();
            var group39 = new Konva.Group();
            stage39.add(layer39);
            stage39.add(templayer39);
            var path39;
            for (var i = 0; i < this.body39.length; i++) {
                path39 = new Konva.Path({
                    x: 0,
                    y: 0,
                    fill: "#f5f5f5",
                    data: this.body39[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25
                });
                layer39.add(path39);
            }
            var rectungle39;
            var text39;
            var borderOfRect39;

            borderOfRect39 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 0,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group39.add(borderOfRect39);
            rectungle39 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 15,
                width: 25,
                height: 25,
                name: "rect answer",
                fill: this.getRandomColor(),
                draggable: true
            });
            group39.add(rectungle39);
            text39 = new Konva.Text({
                x: 235,
                y: 22,
                draggable: false,
                fill: "black",
                text: "Выделить"
            });
            group39.add(text39);

            borderOfRect39 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 65,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group39.add(borderOfRect39);
            var clear_rectungle39;
            clear_rectungle39 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 80,
                width: 25,
                height: 25,
                name: "rectungle сlear",
                fill: "#f5f5f5",
                stroke: "black",
                strokeWidth: 2,
                draggable: false
            });
            group39.add(clear_rectungle39);
            text39 = new Konva.Text({
                x: 235,
                y: 87,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group39.add(text39);

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/test39.png`,
                function(darthNode) {
                    darthNode.setAttrs({
                        x: 0,
                        y: 0,
                        scaleX: 1,
                        scaleY: 1
                    });
                    templayer39.add(darthNode);
                    templayer39.batchDraw();
                }
            );

            templayer39.add(group39);
            templayer39.draw();
            layer39.draw();

            stage39.on("dragstart", function(e) {
                e.target.moveTo(templayer39);
                this.colorRect = e.target.fill();
                //console.log("Moving " + e.target.name());
                layer39.draw();
            });

            var previousShape;
            stage39.on("dragmove", function(evt) {
                var pos = stage39.getPointerPosition();
                var shape = layer39.getIntersection(pos);
                if (previousShape && shape) {
                    if (previousShape !== shape) {
                        // leave from old targer
                        previousShape.fire(
                            "dragleave",
                            {
                                type: "dragleave",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );

                        // enter new targer
                        shape.fire(
                            "dragenter",
                            {
                                type: "dragenter",
                                target: shape,
                                evt: evt.evt
                            },
                            true
                        );
                        previousShape = shape;
                    } else {
                        previousShape.fire(
                            "dragover",
                            {
                                type: "dragover",
                                target: previousShape,
                                evt: evt.evt
                            },
                            true
                        );
                    }
                } else if (!previousShape && shape) {
                    previousShape = shape;
                    shape.fire(
                        "dragenter",
                        {
                            type: "dragenter",
                            target: shape,
                            evt: evt.evt
                        },
                        true
                    );
                } else if (previousShape && !shape) {
                    previousShape.fire(
                        "dragleave",
                        {
                            type: "dragleave",
                            target: previousShape,
                            evt: evt.evt
                        },
                        true
                    );
                    previousShape = undefined;
                }
            });
            var ansKube39 = {};
            stage39.on("dragend", function(e) {
                var pos = stage39.getPointerPosition();
                var shape = layer39.getIntersection(pos);
                if (shape) {
                    previousShape.fire(
                        "drop",
                        {
                            type: "drop",
                            target: previousShape,
                            evt: e.evt
                        },
                        true
                    );
                }
                if (previousShape != undefined) {
                    ansKube39.numOfRect = e.target.name();
                    self.answerList.push(ansKube39);
                    e.target.destroy();
                    ansKube39 = {};
                }
                previousShape = undefined;
                layer39.draw();
                templayer39.draw();
            });

            stage39.on("dragenter", function(e) {
                //e.target.fill("red");
                //console.log("dragenter " + e.target.name());
                layer39.draw();
            });

            stage39.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                //console.log("dragleave " + e.target.name());
                layer39.draw();
            });

            stage39.on("dragover", function(e) {
                //console.log("dragover " + e.target.name());
                layer39.draw();
            });

            stage39.on("drop", function(e) {
                e.target.fill(this.colorRect);
                //console.log("drop " + e.target.name());
                ansKube39.numOfPath = e.target.name();
                //console.log(ansKube39);
                e.target.moveTo(templayer39);
                this.colorRect = "";
                layer39.draw();
            });
            this.fitStageIntoParentContainer();
            clear_rectungle39.on("click", this.onStart);
            clear_rectungle39.on("tap", this.onStart);
        }
    },
    mounted() {
        if (!this.completed)
        {
            setTimeout(() => {
                this.onStart();
                let swiper = document.querySelector(".test-swiper").swiper
                swiper.update()
            }, 2000)
        }
    },
    created() {
        this.currentUrl = window.location.origin;
        window.addEventListener("resize", this.fitStageIntoParentContainer);
        // вывести ответы пользователя, если попытка завершена
        if (this.currentQuestionAnswers) {
            this.answer = this.currentQuestionAnswers.answer;
        }
    },
    watch: {
        answerList: {
            handler: function(newVal, oldVal) {
                this.answer[2].result = this.answerList[
                    this.answerList.length - 1
                ].numOfPath;
            },
            deep: true
        },
        answer: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 39,
                    answer: this.answer
                });
            },
            deep: true
        }
    }
};
</script>
