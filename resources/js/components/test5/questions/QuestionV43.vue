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
                        имеется полное поперечное поражение спинного мозга на
                        уровне Th10.
                        <br /><img
                            :src="currentUrl + '/test-img/icon3.png'"
                            alt="courses"
                        />
                        поверхностная
                        <img
                            :src="currentUrl + '/test-img/icon4.png'"
                            alt="courses"
                        />
                        глубокая и сложная
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
                                :src="currentUrl + '/test-img/arm1.png'"
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
                        :src="currentUrl + '/test-img/test95.png'"
                        alt="courses"
                    />
                </div>
                <div class="compliance-block" style="margin-left:20px">
                    <div class="test-explanation test-explanation-desc">
                        <p class="explanation-txt">
                            <b>Дано:</b><br />
                            имеется полное поперечное поражение спинного мозга
                            на уровне Th10.
                            <br /><img
                                :src="currentUrl + '/test-img/icon3.png'"
                                alt="courses"
                            />
                            поверхностная
                            <img
                                :src="currentUrl + '/test-img/icon4.png'"
                                alt="courses"
                            />
                            глубокая и сложная
                        </p>
                    </div>
                    <ul>
                        <li v-for="(item, index) in answers" :key="index">
                            <p class="compliance-txt">
                                {{ item.symbol }}) {{ item.description }}.
                            </p>
                            <input
                                type="text"
                                class="test-input compliance-input"
                                v-model="answer[index].result"
                                v-bind:class="{
                                    correct:
                                        correct(
                                            answer[index].result,
                                            answer[index].correct
                                        ) == 1,
                                    incorrect:
                                        correct(
                                            answer[index].result,
                                            answer[index].correct
                                        ) == 0
                                }"
                                :readonly="serverAnswers"
                            />
                        </li>
                    </ul>
                    <p class="compliance-txt">
                        Д) Изобразите все это на фигуре человека, наложив
                        кальку.
                    </p>
                    <div id="stage-parent43">
                        <div v-if="!completed" id="question_43"></div>
                        <div v-if="completed" id="question_43">
                            <img
                                :src="currentUrl + '/test-img/answer43.png'"
                                alt="courses"
                                v-bind:class="{
                                    correct:
                                        correctArray(
                                            answer[4].result,
                                            answer[4].correct
                                        ) == 1,
                                    incorrect:
                                        correctArray(
                                            answer[4].result,
                                            answer[4].correct
                                        ) == 0
                                }"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var stage43 = null;
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
                    correct: "Проводниковая"
                },
                {
                    result: "",
                    correct: "параанестезия"
                },
                {
                    result: "",
                    correct: "2"
                },
                {
                    result: "",
                    correct: "с Th10"
                },
                {
                    result: [],
                    correct: [
                        "a path piece 1 rect answer 2",
                        "a path piece 0 rect answer 1"
                    ]
                }
            ],
            answers: [
                {
                    part: 0,
                    symbol: "А",
                    description: " Укажите тип нарушения чувствительности",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Б",
                    description: " Укажите тип анестезии",
                    result: null
                },
                {
                    part: 0,
                    symbol: "В",
                    description: " Укажите число пораженных конечностей",
                    result: null
                },
                {
                    part: 0,
                    symbol: "Г",
                    description: " Укажите границы анестезии",
                    result: null
                }
            ],
            body43: [
                "M 58.12,169.62 C 58.12,169.62 58.00,153.00 58.00,153.00 57.99,145.98 57.45,135.02 54.00,129.00 53.11,134.49 54.29,143.32 54.92,149.00 54.92,149.00 54.92,168.00 54.92,168.00 54.98,180.37 51.61,181.90 47.42,193.00 42.30,206.58 39.33,217.42 31.17,230.00 26.42,237.31 29.43,239.56 26.16,246.00 21.38,255.42 9.92,256.82 3.00,249.00 10.90,246.15 12.71,243.25 14.00,235.00 9.68,236.04 7.86,236.50 4.00,234.00 7.11,232.54 17.44,225.78 18.98,222.96 18.98,222.96 23.13,200.00 23.13,200.00 27.40,182.75 31.75,184.93 32.00,163.00 32.00,163.00 33.00,150.00 33.00,150.00 33.16,135.89 31.23,119.80 38.35,107.00 42.68,99.20 50.35,93.25 58.00,88.87 64.01,85.43 71.89,82.82 74.91,75.99 77.23,70.76 75.67,64.16 74.00,59.00 68.88,45.62 66.02,45.63 66.00,32.00 65.97,15.46 67.65,6.78 86.00,2.47 89.77,1.94 95.53,1.43 99.00,3.17 105.47,6.43 107.91,13.35 109.08,20.00 111.60,34.41 102.62,54.62 98.06,59.00 97.68,63.04 96.76,65.99 98.06,70.00 101.64,80.51 110.99,83.35 119.00,88.90 124.54,92.74 128.83,97.91 131.68,104.00 139.98,121.74 138.97,146.74 139.00,166.00 139.02,180.43 143.97,184.70 147.37,198.00 149.60,206.72 149.91,219.03 155.39,226.00 159.53,231.26 162.02,231.70 167.00,235.00 167.00,235.00 157.00,235.00 157.00,235.00 158.23,241.58 162.02,245.81 161.67,250.00 161.34,253.90 158.10,257.28 154.00,256.51 140.77,254.03 145.50,234.28 142.05,225.00 142.05,225.00 127.89,200.00 127.89,200.00 124.72,193.25 123.76,187.75 121.53,181.00 121.53,181.00 117.04,170.00 117.04,170.00 114.57,160.13 114.65,141.26 116.00,131.00 111.60,133.77 111.72,138.18 110.92,143.00 108.91,155.15 108.98,158.96 109.00,171.00 109.00,171.00 109.62,175.88 110.50,183.00 94.20,187.78 84.00,191.12 84.00,191.12 84.00,191.12 66.53,183.29 58.12,181.25 58.00,177.38 58.11,181.91 58.12,169.62 Z",
                "M 52.42,217.00 C 49.30,234.32 48.80,238.39 49.00,256.00 49.00,256.00 55.00,308.00 55.00,308.00 55.00,308.00 53.01,334.00 53.01,334.00 52.67,349.10 61.13,370.25 57.71,383.00 56.48,387.59 49.92,400.32 53.75,404.18 55.61,406.04 67.24,407.83 69.72,406.94 71.25,406.39 71.96,405.38 72.42,403.87 73.59,400.01 70.71,386.52 70.13,382.00 70.13,382.00 70.89,367.00 70.89,367.00 70.89,367.00 73.39,355.00 73.39,355.00 74.95,346.75 76.21,338.38 76.63,330.00 76.63,330.00 75.04,312.00 75.04,312.00 74.68,302.78 78.77,294.02 80.25,285.00 82.50,271.24 82.03,260.75 82.00,247.00 81.98,236.06 77.98,236.25 71.00,228.00 74.25,230.33 80.14,236.90 84.00,236.18 87.50,235.52 89.86,230.90 96.00,228.00 87.77,239.48 85.02,234.74 85.22,247.00 85.22,247.00 85.22,282.00 85.22,282.00 86.70,289.98 91.38,300.15 90.82,308.00 89.84,321.73 87.46,325.77 89.17,341.00 89.17,341.00 94.71,365.00 94.71,365.00 94.82,368.75 92.83,371.43 92.51,375.00 92.51,375.00 92.51,384.00 92.51,384.00 92.51,384.00 87.00,407.00 87.00,407.00 92.84,407.12 103.20,408.71 107.44,403.72 111.70,398.71 108.03,384.67 108.00,378.00 107.96,368.03 111.09,359.76 112.42,350.00 114.30,336.28 108.58,314.97 108.04,301.00 107.70,292.29 111.67,282.66 113.58,274.00 116.27,261.77 117.14,250.48 117.00,238.00 117.00,238.00 109.89,178.23 110.51,182.98 99.07,186.33 84.03,191.09 84.03,191.09 84.03,191.09 63.00,182.00 58.12,181.25 57.12,187.38 54.61,204.86 52.42,217.00 Z"
            ],
            body43Back: [
                "M 80.33,166.67 C 93.55,176.09 101.91,182.45 109.00,189.28 114.63,209.52 118.82,243.17 116.83,264.00 116.83,264.00 110.00,308.00 110.00,308.00 110.00,308.00 113.00,344.00 113.00,344.00 113.00,344.00 110.65,376.98 110.65,376.98 111.08,385.48 120.85,379.76 119.16,388.02 117.35,396.85 106.11,408.41 99.74,400.69 97.54,398.02 97.96,392.35 98.00,389.00 98.09,381.92 99.80,376.65 98.70,369.00 96.66,354.73 91.03,345.69 91.00,329.00 91.00,329.00 91.00,303.00 91.00,303.00 90.84,289.64 85.02,282.33 85.00,268.00 85.00,268.00 85.00,242.00 85.00,242.00 92.96,244.99 102.04,245.97 105.00,236.00 105.00,236.00 102.00,236.00 102.00,236.00 101.71,237.68 101.75,238.95 100.40,240.26 98.01,242.60 86.01,243.92 84.85,235.98 84.35,232.50 86.04,227.40 84.00,219.00 84.00,219.00 89.00,213.00 89.00,213.00 89.00,213.00 82.00,217.00 82.00,217.00 82.00,217.00 78.00,212.00 78.00,212.00 78.00,212.00 81.49,219.28 81.49,219.28 82.19,221.36 82.03,226.61 82.00,229.00 81.91,236.04 79.70,243.94 71.00,243.71 67.58,243.62 63.34,241.20 60.00,240.00 68.94,247.27 72.62,247.54 82.00,241.00 82.00,241.00 82.00,271.00 82.00,271.00 82.00,271.00 76.00,325.00 76.00,325.00 76.00,325.00 77.82,351.00 77.82,351.00 77.82,351.00 76.00,367.00 76.00,367.00 75.23,370.81 73.37,377.31 73.82,381.00 74.96,390.37 84.48,384.37 82.55,393.00 80.40,402.66 64.84,410.74 60.09,402.85 58.00,399.17 60.06,386.26 60.09,381.00 60.09,381.00 53.21,342.00 53.21,342.00 52.61,330.54 57.73,319.29 57.99,308.00 58.24,296.84 53.44,283.10 50.89,272.00 48.53,261.75 46.88,243.56 47.00,233.00 47.00,233.00 51.00,188.33 51.00,188.33 58.77,182.77 62.93,178.96 80.33,166.67 Z",
                "M 51.00,188.33 C 51.00,188.33 48.58,137.00 48.58,137.00 47.92,132.23 48.36,128.74 44.00,126.00 45.68,132.92 45.50,139.98 46.17,147.00 47.68,162.86 49.80,177.68 43.94,193.00 43.94,193.00 25.52,227.00 25.52,227.00 24.08,231.08 25.23,234.77 24.83,239.00 24.45,242.95 23.26,247.25 22.00,251.00 18.34,261.81 13.50,266.78 2.00,262.00 2.00,262.00 8.56,252.00 8.56,252.00 8.56,252.00 12.00,240.00 12.00,240.00 12.00,240.00 4.00,243.00 4.00,243.00 4.00,243.00 9.70,232.17 9.70,232.17 11.70,229.43 14.00,228.42 15.44,224.99 15.44,224.99 19.61,201.00 19.61,201.00 19.61,201.00 27.83,160.00 27.83,160.00 29.54,142.35 27.57,124.16 33.03,107.00 34.97,100.88 37.67,95.64 43.01,91.80 49.70,86.99 62.42,85.36 66.21,72.00 68.64,63.44 62.17,59.34 59.55,52.00 58.36,48.69 58.07,45.44 57.58,42.00 56.83,36.81 57.00,33.16 57.00,28.00 57.00,18.97 56.45,10.54 65.02,4.70 69.31,1.77 74.04,1.95 79.00,2.00 82.13,2.04 83.96,2.11 87.00,3.05 101.51,7.57 99.14,20.85 99.00,33.00 98.93,38.68 97.61,47.74 95.54,53.00 92.68,60.25 88.94,61.79 90.90,70.00 95.54,89.41 115.60,89.20 122.52,106.00 124.47,110.74 126.31,125.85 127.42,132.00 127.42,132.00 134.79,178.00 134.79,178.00 134.79,178.00 141.94,194.00 141.94,194.00 144.09,199.62 147.24,211.83 149.97,215.99 152.67,220.10 159.03,224.80 163.00,228.00 163.00,228.00 153.00,228.00 153.00,228.00 157.07,237.38 160.83,239.16 161.83,241.96 163.26,245.94 158.11,248.17 155.00,248.64 142.65,250.50 143.43,228.12 138.99,221.04 136.28,216.69 132.19,215.50 127.37,206.00 127.37,206.00 120.09,185.00 120.09,185.00 113.47,172.44 109.02,174.47 109.00,158.00 109.00,158.00 111.00,128.00 111.00,128.00 105.11,131.70 107.44,139.90 106.72,146.00 106.72,146.00 103.78,179.25 109.00,189.27 104.82,184.36 86.36,170.97 80.36,166.64 69.82,174.00 56.91,183.91 51.00,188.33 Z"
            ],
            colorRect: "",
            question_43Width: 367,
            question_43Height: 430
        };
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
        correctArray(a, b) {
            if (!this.serverAnswers) {
                return null;
            }

            if (this.equals(a, b)) {
                return 1;
            }

            return 0;
        },
        equals(a, b) {
            if (a.length !== b.length) {
                return false;
            }

            var seen = {};
            a.forEach(function(v) {
                var key = typeof v + v;
                if (!seen[key]) {
                    seen[key] = 0;
                }
                seen[key] += 1;
            });

            return b.every(function(v) {
                var key = typeof v + v;
                if (seen[key]) {
                    seen[key] -= 1;
                    return true;
                }
            });
        },
        getAnswerList(part) {
            return this.answers.filter(item => item.part === part);
        },
        fitStageIntoParentContainer() {
            var container = document.querySelector("#stage-parent43");

            // now we need to fit stage into parent
            //var containerWidth = container.offsetWidth;
            // to do this we need to scale the stage
            //var scale = containerWidth / this.question_43Width;
            var scale = 0.85;

            stage43.width(this.question_43Width * scale);
            stage43.height(this.question_43Height);
            stage43.scale({
                x: scale,
                y: scale
            });
            stage43.draw();
        },

        onStart() {
            if (this.answerList.length > 0) {
                this.answerList = [];
            }
            const self = this;
            stage43 = new Konva.Stage({
                container: "question_43",
                width: this.question_43Width,
                height: this.question_43Height
            });
            var templayer43 = new Konva.Layer();
            var layer43 = new Konva.Layer();
            var group43 = new Konva.Group();
            var answerList43 = [];
            stage43.add(layer43);
            stage43.add(templayer43);
            var path43Front;
            for (var i = 0; i < this.body43.length; i++) {
                path43Front = new Konva.Path({
                    x: 0,
                    y: 75,
                    fill: "#f5f5f5",
                    data: this.body43[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25
                });
                layer43.add(path43Front);
            }
            var path43Back;
            for (var i = 0; i < this.body43Back.length; i++) {
                path43Back = new Konva.Path({
                    x: 200,
                    y: 75,
                    fill: "#f5f5f5",
                    data: this.body43Back[i],
                    name: "a path piece " + i,
                    numPoints: 10,
                    innerRadius: 20,
                    outerRadius: 25
                });
                layer43.add(path43Back);
            }
            var rectungle43;
            var text43;
            var borderOfRect43;

            borderOfRect43 = new Konva.Rect({
                cornerRadius: 5,
                x: 1,
                y: 1,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group43.add(borderOfRect43);
            rectungle43 = new Konva.Rect({
                cornerRadius: 5,
                x: 16,
                y: 16,
                width: 25,
                height: 25,
                name: "rect answer 1",
                fill: "black",
                draggable: true
            });
            group43.add(rectungle43);
            rectungle43 = new Konva.Rect({
                cornerRadius: 5,
                x: 16,
                y: 16,
                width: 25,
                height: 25,
                name: "rect answer 2",
                fill: "black",
                draggable: true
            });
            group43.add(rectungle43);
            text43 = new Konva.Text({
                x: 55,
                y: 23,
                draggable: false,
                fill: "black",
                text: "Выделить"
            });
            group43.add(text43);

            borderOfRect43 = new Konva.Rect({
                cornerRadius: 5,
                x: 180,
                y: 1,
                width: 164,
                height: 55,
                fill: "#f5f5f5",
                stroke: "#e6e6e6",
                strokeWidth: 1
            });
            group43.add(borderOfRect43);
            var clear_rectungle43;
            clear_rectungle43 = new Konva.Rect({
                cornerRadius: 5,
                x: 195,
                y: 16,
                width: 25,
                height: 25,
                name: "rectungle сlear",
                fill: "#f5f5f5",
                stroke: "black",
                strokeWidth: 2,
                draggable: false
            });
            group43.add(clear_rectungle43);
            text43 = new Konva.Text({
                x: 235,
                y: 23,
                draggable: false,
                fill: "black",
                text: "Очистить"
            });
            group43.add(text43);

            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/test39.png`,
                function(darthNode) {
                    darthNode.setAttrs({
                        x: 0,
                        y: 75,
                        scaleX: 1,
                        scaleY: 1
                    });
                    templayer43.add(darthNode);
                    templayer43.batchDraw();
                }
            );
            Konva.Image.fromURL(
                `${this.currentUrl}/test-img/test42.png`,
                function(darthNode) {
                    darthNode.setAttrs({
                        x: 200,
                        y: 75,
                        scaleX: 1,
                        scaleY: 1
                    });
                    templayer43.add(darthNode);
                    templayer43.batchDraw();
                }
            );

            templayer43.add(group43);
            templayer43.draw();
            layer43.draw();

            stage43.on("dragstart", function(e) {
                e.target.moveTo(templayer43);
                this.colorRect = e.target.fill();
                //console.log("Moving " + e.target.name());
                layer43.draw();
            });

            var previousShape;
            stage43.on("dragmove", function(evt) {
                var pos = stage43.getPointerPosition();
                var shape = layer43.getIntersection(pos);
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
            var ansKube43 = {};
            stage43.on("dragend", function(e) {
                var pos = stage43.getPointerPosition();
                var shape = layer43.getIntersection(pos);
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
                    ansKube43.numOfRect = e.target.name();
                    self.answerList.push(ansKube43);
                    e.target.destroy();
                    ansKube43 = {};
                }
                previousShape = undefined;
                layer43.draw();
                templayer43.draw();
            });

            stage43.on("dragenter", function(e) {
                e.target.fill("red");
                //console.log("dragenter " + e.target.name());
                layer43.draw();
            });

            stage43.on("dragleave", function(e) {
                e.target.fill("#f5f5f5");
                //console.log("dragleave " + e.target.name());
                layer43.draw();
            });

            stage43.on("dragover", function(e) {
                //console.log("dragover " + e.target.name());
                layer43.draw();
            });

            stage43.on("drop", function(e) {
                e.target.fill(this.colorRect);
                //console.log("drop " + e.target.name());
                ansKube43.numOfPath = e.target.name();
                //console.log(answerList43);
                e.target.moveTo(templayer43);
                this.colorRect = "";
                layer43.draw();
            });
            this.fitStageIntoParentContainer();
            clear_rectungle43.on("click", this.onStart);
            clear_rectungle43.on("tap", this.onStart);
        }
    },
    watch: {
        answerList: {
            handler: function(newVal, oldVal) {
                this.answer[4].result = [];
                this.answerList.forEach(element => {
                    this.answer[4].result.push(
                        `${element.numOfPath} ${element.numOfRect}`
                    );
                });
            },
            deep: true
        },
        answer: {
            handler: function(newVal, oldVal) {
                this.$emit("answer", {
                    question_index: 43,
                    answer: this.answer
                });
            },
            deep: true
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
    computed: {
        currentQuestionAnswers() {
            if (!this.serverAnswers) {
                return null;
            }

            return this.serverAnswers.find(x => x.question_index == "43");
        }
    }
};
</script>
