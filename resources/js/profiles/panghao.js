import * as THREE from "three";
import { OBJLoader2 } from "three/examples/jsm/loaders/OBJLoader2.js";
import OrbitControls from "three-orbitcontrols";
import {
    CSS3DObject,
    CSS3DRenderer
} from "three/examples/jsm/renderers/CSS3DRenderer";
import { textPanel } from "./HTMLElements";
import { ClickPoints } from "./ClickPoints";
import { FullScreenDimension2D } from "./Utilities";
const scene = new THREE.Scene();
//set scene background
scene.background = new THREE.Color(0x343a40);
//build a new scene for CSS3DRender seperately
const CSSScene = new THREE.Scene();
const renderer = new THREE.WebGLRenderer({ antialias: true });
const CSSRenderer = new CSS3DRenderer();
//build a new perspective camera
const CAMHEIGHT = 50;
const CAMRADIUS = 550;
const FOV = 90;
const ASPECT = window.innerWidth / window.innerHeight;
const camera = new THREE.PerspectiveCamera(FOV, ASPECT, 0.1, 2000);
//place camera postion and bind the camera with OrbitControl
const controls = new OrbitControls(camera, CSSRenderer.domElement);
camera.position.set(-CAMRADIUS, CAMHEIGHT, 0);
camera.lookAt(0, 0, 0);

//build the robot object
const manager = new THREE.LoadingManager();
const imgLoader = new THREE.ImageLoader(manager);

const bodyTexture = new THREE.Texture();
const headTexture = new THREE.Texture();

imgLoader.load("images/models/BB8/Body diff MAP.jpg", image => {
    bodyTexture.image = image;
    bodyTexture.needsUpdate = true;
});
imgLoader.load("images/models/BB8/HEAD diff MAP.jpg", image => {
    headTexture.image = image;
    headTexture.needsUpdate = true;
});

const robLoader = new OBJLoader2();
let meshes = [];
robLoader.load("images/models/BB8/bb8.obj", object => {
    object.traverse(descendant => {
        if (descendant instanceof THREE.Mesh) {
            meshes.push(descendant);
        }
    });
    let head = meshes[0];
    let body = meshes[1];
    // head.scale.set(0.2, 0.2, 0.2);
    // body.scale.set(0.2, 0.2, 0.2);
    head.position.y = -80;
    body.position.y = -80;
    let mapHeightBody = new THREE.TextureLoader().load(
        "images/models/BB8/BODY bump MAP.jpg"
    );
    let mapHeightHead = new THREE.TextureLoader().load(
        "images/models/BB8/HEAD bump MAP.jpg"
    );
    head.material = new THREE.MeshPhongMaterial({
        map: headTexture,
        depthWrite: true,
        depthTest: true,
        specular: 0xfceed2,
        bumpMap: mapHeightHead,
        bumpScale: 0.4,
        shininess: 25
    });
    body.material = new THREE.MeshPhongMaterial({
        map: bodyTexture,
        depthWrite: true,
        depthTest: true,
        specular: 0xfceed2,
        bumpMap: mapHeightBody,
        bumpScale: 0.4,
        shininess: 25
    });
    scene.add(head, body);
});

//create a line conects three fixed points
// const lineMaterial = new THREE.LineBasicMaterial({
//     color: 0xf0efeb
// });

// const point = [];
// point.push(new THREE.Vector3(-10, 0, 0));
// point.push(new THREE.Vector3(0, 10, 10));
// point.push(new THREE.Vector3(10, 0, 0));
// const newGeo = new THREE.BufferGeometry().setFromPoints(point);
// const line = new THREE.Line(newGeo, lineMaterial);

//draw a curve
const curve = new THREE.EllipseCurve(0, 0, 450, 450, 0, Math.PI, false, 0);
const curvePoints = RotationEllipse(curve.getPoints(50));
const clickPointsPst = RotationEllipse(curve.getPoints(4));
const spheres = ClickPoints(clickPointsPst);
spheres.forEach(element => {
    scene.add(element);
});

// const curveGeo = new THREE.BufferGeometry().setFromPoints(curvePoints);
// const ellipse = new THREE.Line(curveGeo, lineMaterial);
// scene.add(ellipse);

//add an ambient light here
const ambienLight = new THREE.AmbientLight(0xcbc9bb, 0.5);

//add an direction light
const light = new THREE.DirectionalLight(0xfcf9e8, 0.7);
light.position.set(-0.5, 1, 0);

//add lights into scene
scene.add(ambienLight, light);

//add a transparent grid plane
const planeGeometry = new THREE.PlaneBufferGeometry(2000, 2000);
planeGeometry.rotateX(-Math.PI / 2);
const planeMaterial = new THREE.ShadowMaterial({
    opacity: 0.2
});
const plane = new THREE.Mesh(planeGeometry, planeMaterial);
plane.position.y = -100;
plane.receiveShadow = true;
scene.add(plane);
const grid = new THREE.GridHelper(2000, 100);
grid.position.y = -99;
grid.material.opacity = 0.25;
grid.material.transparent = true;
scene.add(grid);

//create a tube geometry
const tubeCurve = new THREE.CatmullRomCurve3(curvePoints);
const tubeGeo = new THREE.TubeBufferGeometry(tubeCurve, 64, 0.8, 8, false);
// console.log(tubeGeo);
const tubeMat = new THREE.MeshBasicMaterial({
    color: 0xf0efeb,
    opacity: 0.5,
    transparent: true
});
const tube = new THREE.Mesh(tubeGeo, tubeMat);
scene.add(tube);

//create 2D html element and add them to 3D scene
let CSSObjects = [];
let aboutMeContent =
    "<p>Lorem ipsum dolor sit amet, admodum volumus at vim</p>";
aboutMeContent +=
    "<p>Ex saperet explicari pro. Ne quo natum summo platonem, pro eu denique periculis. Detraxit lobortis persequeris eu vis, ei eum dico nihil mandamus, cu sit etiam essent eloquentiam.</p>";
aboutMeContent +=
    "<p>Ea mei erant aeque volutpat, cibo aeterno at qui, at habemus evertitur dissentias mei. Autem oratio temporibus eu qui. Duo utinam debitis in, in partem mandamus sed. Sit no harum imperdiet consetetur. Ex dictas consulatu cum, per an copiosae delicata. Rebum disputationi quo no, qui ullum iriure te, ut pri malorum feugiat.</p>";
const aboutMe = textPanel("about-me", "About Myself", aboutMeContent);
// aboutMe.style.width = 300 * ASPECT + "px";
aboutMe.style.width = "570.35px";
aboutMe.style.height = "301.23px";
const aboutMeObj3D = new CSS3DObject(aboutMe);
let objectRotateX = -Math.atan(CAMHEIGHT / CAMRADIUS);
let objectX = 400;
let objectY = CAMHEIGHT - (CAMRADIUS - objectX) * (CAMHEIGHT / CAMRADIUS);
aboutMeObj3D.position.set(-400, objectY, 0);
aboutMeObj3D.rotateY(-Math.PI / 2);
aboutMeObj3D.rotateX(objectRotateX);
CSSObjects.push(aboutMeObj3D);
for (let object of CSSObjects) {
    CSSScene.add(object);
}
console.log(
    FullScreenDimension2D(aboutMeObj3D.position, FOV, camera.position, ASPECT)
);
function init() {
    //set the reandering area size
    renderer.setSize(window.innerWidth, window.innerHeight);
    CSSRenderer.setSize(window.innerWidth, window.innerHeight);
    renderer.domElement.style.zIndex = -1;
    renderer.domElement.style.position = "absolute";
    CSSRenderer.domElement.style.position = "absolute";
    CSSRenderer.domElement.style.top = 0;
    //add the rendered area into the target html element
    document.querySelector(".three").appendChild(renderer.domElement);
    document.querySelector(".three").appendChild(CSSRenderer.domElement);
    //call WebGL to render the scene and camera
    renderer.render(scene, camera);
    CSSRenderer.render(CSSScene, camera);
    window.addEventListener("resize", onWindowResize);
}

function animation() {
    requestAnimationFrame(animation);
    controls.update();
    renderer.render(scene, camera);
    CSSRenderer.render(CSSScene, camera);
}
init();
animation();

function RotationEllipse(points) {
    let result = [];
    points.forEach(point => {
        let y = point.y;
        point.y = 0;
        point.z = y;
        result.push(new THREE.Vector3(point.x, point.y, point.z));
    });
    return result;
}

// rendering scene again when the window size is changed
function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
    CSSRenderer.setSize(window.innerWidth, window.innerHeight);
}
