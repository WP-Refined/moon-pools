export default (arr, { minX, minY, maxX, maxY }, max, min, maxAmount) => {
    arr = arr.map(item => (typeof item === 'number' ? item : item.downloads)); // TODO: Refactor to support generic type

    const minValue = min - 0.001;
    const gridX = (maxX - minX) / (maxAmount - 1);
    const gridY = (maxY - minY) / (max + 0.001 - minValue);

    return arr.map((value, index) => {
        return {
            x: index * gridX + minX,
            y:
                maxY -
                (value - minValue) * gridY +
                (index === maxAmount - 1) * 0.00001 -
                +(index === 0) * 0.00001,
        };
    });
};
