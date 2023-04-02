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
                        патологический процесс в шейном утолщении спинного
                        мозга. Имеется полное поперечное поражение С5-С8.
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
                        :src="currentUrl + '/test-img/test94.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br />
                            патологический процесс в шейном утолщении спинного
                            мозга. Имеется полное поперечное поражение С5-С8.
                        </p>
                    </div>
                    <ul>
                        <li v-for="(item, index) in firstPart" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}.
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
                        фигуре человека через кальку
                    </p>
                    <div id="stage-parent42">
                        <div v-if="!completed" id="question_42"></div>
                        <div v-if="completed" id="question_42">
                            <img
                                :src="currentUrl + '/test-img/answer42.png'"
                                alt="courses"
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
                                    :id="'v42-radio' + index"
                                    type="radio"
                                    name="radio42v"
                                    :value="index"
                                    v-model="answer[1].result"
                                    :disabled="serverAnswers"
                                />
                                <label
                                    :for="'v42-radio' + index"
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
var stage42 = null;
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
            answerList: [],
            testPass: false,
            answer: [
                {
                    result: "",
                    correct: "сегментарной анестезии С5-С8 с двух сторон"
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
            body42: [
                "M 102.91,79.09 C 108.91,83.09 111.57,83.76 119.00,88.90 124.54,92.74 128.83,97.91 131.68,104.00 140.10,121.99 138.97,146.53 139.00,166.00 139.02,180.43 143.97,184.70 147.37,198.00 149.60,206.72 149.91,219.03 155.39,226.00 159.53,231.26 162.02,231.70 167.00,235.00 167.00,235.00 157.00,235.00 157.00,235.00 158.23,241.58 162.02,245.81 161.67,250.00 161.34,253.90 158.10,257.28 154.00,256.51 140.77,254.03 145.50,234.28 142.05,225.00 142.05,225.00 127.89,200.00 127.89,200.00 124.72,193.25 123.76,187.75 121.53,181.00 121.53,181.00 117.04,170.00 117.04,170.00 114.57,160.13 114.65,141.26 116.00,131.00 111.60,133.77 111.72,138.18 110.92,143.00 108.91,155.15 108.98,158.96 109.00,171.00 109.03,191.77 117.35,217.67 117.00,248.00 116.75,268.63 108.81,286.99 108.09,298.00 108.09,298.00 112.96,343.00 112.96,343.00 113.46,355.96 107.94,363.75 108.00,378.00 108.03,384.67 111.70,398.71 107.44,403.72 103.20,408.71 92.84,407.12 87.00,407.00 87.00,407.00 92.46,384.00 92.46,384.00 92.46,384.00 92.46,375.00 92.46,375.00 92.65,371.27 94.81,368.92 94.71,365.00 94.60,360.07 87.47,342.37 88.32,331.00 88.32,331.00 90.82,305.00 90.82,305.00 90.82,305.00 85.14,281.00 85.14,281.00 85.14,281.00 85.14,247.00 85.14,247.00 85.02,234.74 87.77,239.48 96.00,228.00 89.86,230.90 87.50,235.52 84.00,236.18 80.14,236.90 74.25,230.33 71.00,228.00 77.98,236.25 81.98,236.06 82.00,247.00 82.03,260.75 82.50,271.24 80.25,285.00 78.77,294.02 74.68,302.78 75.04,312.00 75.04,312.00 76.79,330.00 76.79,330.00 76.35,338.62 74.86,347.53 73.20,356.00 73.20,356.00 70.89,367.00 70.89,367.00 70.89,367.00 70.39,383.00 70.39,383.00 70.99,387.12 73.43,400.51 72.42,403.87 70.76,409.33 59.11,407.06 55.21,405.14 50.02,402.58 53.66,393.99 55.21,390.00 56.83,385.79 58.53,381.57 58.79,377.00 58.79,377.00 53.01,334.00 53.01,334.00 53.01,334.00 55.00,308.00 55.00,308.00 55.00,308.00 49.00,256.00 49.00,256.00 48.84,242.29 48.96,235.67 51.42,222.00 53.77,209.01 57.98,191.92 58.00,179.00 58.00,179.00 58.00,154.00 58.00,154.00 58.00,154.00 56.00,130.00 56.00,130.00 56.00,130.00 53.00,130.00 53.00,130.00 54.67,142.67 55.02,155.23 55.00,168.00 54.98,180.37 51.61,181.90 47.42,193.00 43.06,204.57 39.35,217.52 32.56,228.00 25.10,239.51 30.15,239.28 25.64,246.98 20.55,255.68 9.53,256.38 3.00,249.00 10.90,246.15 12.71,243.25 14.00,235.00 9.68,236.04 7.86,236.50 4.00,234.00 7.11,232.54 17.44,225.78 18.98,222.96 18.98,222.96 22.74,201.00 22.74,201.00 27.36,182.70 31.73,185.56 32.00,162.00 32.00,162.00 33.00,149.00 33.00,149.00 33.16,134.98 31.26,119.74 38.35,107.00 42.85,98.91 50.09,93.40 58.00,88.87 64.19,85.33 68.36,83.82 73.64,79.09 75.33,80.76 99.11,82.27 102.91,79.09 Z",
                "M 74.00,59.00 C 72.36,53.45 66.02,46.37 66.00,32.00 65.97,15.46 67.65,6.78 86.00,2.47 89.77,1.94 95.53,1.43 99.00,3.17 105.47,6.43 107.91,13.35 109.08,20.00 111.51,33.86 103.27,49.27 98.00,59.00 97.60,64.16 96.09,71.82 102.91,79.09 98.58,82.58 73.42,80.31 73.62,79.10 77.25,75.75 76.73,64.36 74.00,59.00 Z"
            ],
            colorRect: "",
            question_42Width: 367,
            question_42Height: 430
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

            return this.serverAnswers.find(x => x.question_index == "42");
        }
    },
    methods: {
        insensitiveSearch(str1, str2) {
            try {
                str1 = str1.replace("(", "");
                str1 = str1.replace(")", "");
                str2 = str2.replace("(", "");
                str2 = str2.replace(")", "");
            } catch (error) {}

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
            var container = document.querySelector("#stage-parent42");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            //var scale = containerWidth / this.question_42Width;
            var scale = 0.8;

            stage42.width(this.question_42Width * scale);
            stage42.height(this.question_42Height * scale);
            stage42.scale({
                x: scale,
                y: scale
            });
            stage42.draw();
        },

        onStart() {
            const self = this;
            stage42 = new Konva.Stage({
                container: "question_42",
                width: this.question_42Width,
                height: this.question_42Height
            });
            var templayer42 = new Konva.Layer();
            var layer42 = new Konva.Layer();
            var group42 = new Konva.Group();
            var answerList42 = [];
            stage42.add(layer42);
            stage42.add(templayer42);
            var path42;
            for (var i = 0; i < this.body42.length; i++) {
                path42 = new Konva.Path({
                    x: 0,
                    y: 0,
                    fill: "#f5f5f5",
                    data: this.body42[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25
                });
                layer42.add(path42);
            }
            var rectungle42;
            var text42;
            var borderOfRect42;

            borderOfRect42 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 0,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group42.add(borderOfRect42);
            rectungle42 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 15,
                width: 25,
                height: 25,
                name: "rect answer",
                fill: this.getRandomColor(),
                draggable: true
            });
            group42.add(rectungle42);
            text42 = new Konva.Text({
                x: 235,
                y: 22,
                draggable: false,
                fill: "black",
                text: "Выделить"
            });
            group42.add(text42);

            borderOfRect42 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 65,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group42.add(borderOfRect42);
            var clear_rectungle42;
            clear_rectungle42 = new Konva.Rect({
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
            group42.add(clear_rectungle42);
            text42 = new Konva.Text({
                x: 235,
                y: 87,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group42.add(text42);

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/test39.png`,
                function(darthNode) {
                    darthNode.setAttrs({
                        x: 0,
                        y: 0,
                        scaleX: 1,
                        scaleY: 1
                    });
                    templayer42.add(darthNode);
                    templayer42.batchDraw();
                }
            );

            templayer42.add(group42);
            templayer42.draw();
            layer42.draw();

            stage42.on("dragstart", function(e) {
                e.target.moveTo(templayer42);
                this.colorRect = e.target.fill();
                //console.log("Moving " + e.target.name());
                layer42.draw();
            });

            var previousShape;
            stage42.on("dragmove", function(evt) {
                var pos = stage42.getPointerPosition();
                var shape = layer42.getIntersection(pos);
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
            var ansKube42 = {};
            stage42.on("dragend", function(e) {
                var pos = stage42.getPointerPosition();
                var shape = layer42.getIntersection(pos);
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
                    ansKube42.numOfRect = e.target.name();
                    self.answerList.push(ansKube42);
                    e.target.destroy();
                    ansKube42 = {};
                }
                previousShape = undefined;
                layer42.draw();
                templayer42.draw();
            });

            stage42.on("dragenter", function(e) {
                e.target.fill("red");
                //console.log("dragenter " + e.target.name());
                layer42.draw();
            });

            stage42.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                //console.log("dragleave " + e.target.name());
                layer42.draw();
            });

            stage42.on("dragover", function(e) {
                //console.log("dragover " + e.target.name());
                layer42.draw();
            });

            stage42.on("drop", function(e) {
                e.target.fill(this.colorRect);
                //console.log("drop " + e.target.name());
                ansKube42.numOfPath = e.target.name();
                //console.log(answerList42);
                e.target.moveTo(templayer42);
                this.colorRect = "";
                layer42.draw();
            });
            this.fitStageIntoParentContainer();
            clear_rectungle42.on("click", this.onStart);
            clear_rectungle42.on("tap", this.onStart);
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
                    question_index: 42,
                    answer: this.answer
                });
            },
            deep: true
        }
    }
};
</script>
