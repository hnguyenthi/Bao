export const formatPrice = (value) => {
    if (isNaN(value)) return '';
    return `￥${(value + '').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}`;
}
export const formatNumber = (value) => {
    if (isNaN(value)) return '';
    return `${(value + '').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}`;
}