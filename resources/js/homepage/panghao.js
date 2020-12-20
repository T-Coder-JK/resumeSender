import * as THREE from "three";
import OrbitControls from "three-orbitcontrols";

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    0.1,
    1000
);
const renderer = new THREE.WebGLRenderer({ antialias: true });
//set scene background
scene.background = new THREE.Color(0xf0f0f0);
//create a 3D cube
const geometry = new THREE.BoxGeometry();
const material = new THREE.MeshBasicMaterial({
    color: 0xf0f0fd,
    wireframe: false
});
const cube = new THREE.Mesh(geometry, material);

//create a line conects three fixed points
const lineMaterial = new THREE.LineBasicMaterial({
    color: 0x0000ff
});
// const point = [];
// point.push(new THREE.Vector3(-10, 0, 0));
// point.push(new THREE.Vector3(0, 10, 10));
// point.push(new THREE.Vector3(10, 0, 0));
// const newGeo = new THREE.BufferGeometry().setFromPoints(point);
// const line = new THREE.Line(newGeo, lineMaterial);

//draw a curve
const curve = new THREE.EllipseCurve(0, 0, 200, 150, 0, Math.PI, false, 0);
const curvePoints = RotationEllipse(curve.getPoints(50));
const curveGeo = new THREE.BufferGeometry().setFromPoints(curvePoints);
const ellipse = new THREE.Line(curveGeo, lineMaterial);
scene.add(ellipse);

//add a light here
const light = new THREE.AmbientLight(0x2a9d8f);

//add the cube and line into scene
scene.add(cube, light);

//add a transparent grid plane
const planeGeometry = new THREE.PlaneBufferGeometry(2000, 2000);
planeGeometry.rotateX(-Math.PI / 2);
const planeMaterial = new THREE.ShadowMaterial({
    opacity: 0.2
});
const plane = new THREE.Mesh(planeGeometry, planeMaterial);
plane.position.y = -30;
plane.receiveShadow = true;
scene.add(plane);
const grid = new THREE.GridHelper(2000, 100);
grid.position.y = -29;
grid.material.opacity = 0.25;
grid.material.transparent = true;
scene.add(grid);

//place camera postion and bind the camera with OrbitControl
const controls = new OrbitControls(camera, renderer.domElement);
camera.position.set(-5, 5, 20);
camera.lookAt(0, 0, 0);

function init() {
    //set the reandering area size
    renderer.setSize(window.innerWidth, window.innerHeight);
    //add the rendered area into the target html element
    document.querySelector(".three").appendChild(renderer.domElement);

    //call WebGL to render the scene and camera
    renderer.render(scene, camera);
}

function animation() {
    requestAnimationFrame(animation);
    controls.update();
    renderer.render(scene, camera);
}
init();
animation();

function RotationEllipse(points) {
    let result = points.map(point => {
        let y = point.y;
        point.y = 0;
        point.z = y;
        return point;
    });
    return result;
}
