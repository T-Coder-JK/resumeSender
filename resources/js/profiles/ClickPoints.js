import * as THREE from "three";
export function ClickPoints(positions) {
    let spheres = [];

    for (let position of positions) {
        const geometry = new THREE.SphereBufferGeometry(3, 8, 8);
        const material = new THREE.MeshPhongMaterial({
            color: 0x560bad,
            specular: 0x111111,
            depthTest: true,
            depthWrite: true,
            shininess: 50
        });
        const sphere = new THREE.Mesh(geometry, material);
        sphere.position.x = position.x;
        sphere.position.y = position.y;
        sphere.position.z = position.z;
        spheres.push(sphere);
    }

    return spheres;
}
