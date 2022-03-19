export default padding => {
    const arr = padding
        .split(' ')
        .filter(item => item !== '')
        .map(item => parseInt(item));
    switch (arr.length) {
        case 4:
            return { top: arr[0], right: arr[1], bottom: arr[2], left: arr[3] };
        case 3:
            return { top: arr[0], right: arr[1], bottom: arr[2], left: arr[1] };
        case 2:
            return { top: arr[0], right: arr[1], bottom: arr[0], left: arr[1] };
        default:
            return { top: arr[0], right: arr[0], bottom: arr[0], left: arr[0] };
    }
};
