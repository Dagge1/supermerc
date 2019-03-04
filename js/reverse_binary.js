var number = 13; // number to convert

// Number converted to binary and then reversed
function reverseBin(n) {
    // n is converted to a binary string, then converted to an array, then reversed, and finally converted back to a string
    var reversed = n.toString(2).split('').reverse().join("");
    return reversed;
}
var result1 = reverseBin(number);
console.log('Reversed binary representation of a number ' + number + ': ' + result1);


// Number converted to binary, reversed and then represented back in decimal number 
function reverseBin2(n) {
    var reversed = n.toString(2).split('').reverse().join("");
    // same as above, but additionally converted back to decimal number representation of a binary
    var final = parseInt(reversed, 2);
    return final;
}
var result2 = reverseBin2(number);
console.log('Reversed binary number converted to decimal: ' + result2);