import * as THREE from "three";
/**
 *Calculate the full screen size of a 2D plane from a position.
 *When using perspective camera.
 * @param {Vector3} elPosition
 * @param {Number} fov degree
 * @param {Vector3} carmPosition
 * @param {Number} aspect
 */
export function FullScreenDimension2D(elPosition, fov, carmPosition, aspect) {
    let dimension = {};
    let dist = carmPosition.distanceTo(elPosition);
    let maxHeight = dist * Math.tan((fov / 2 / 180) * Math.PI) * 2;
    let maxWidth = maxHeight * aspect;
    dimension = {
        width: maxWidth,
        height: maxHeight
    };
    return dimension;
}

export function RotateX2DPlane(carmPosition, elPosition) {
    let carmHeight = carmPosition.y;
    let carmRadius = new THREE.Vector3(
        carmPosition.x,
        0,
        carmPosition.z
    ).distanceTo(new THREE.Vector3(0, 0, 0));
    
}
