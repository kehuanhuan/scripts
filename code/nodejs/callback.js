#! /usr/bin/node

// var fs = require("fs");

// var a = 1;

// fs.readFile('input.txt', function (err, data) {
//     if (err) return console.error(err);
//     console.log(data.toString(), a);
// });

// console.log("程序执行结束!");


function foo1(name, age, callback) {
    console.log(name, age)
    var b= 3
    callback(name)
}

foo1('ke', '18', function (name, b) {
    console.log(name, b)
    b = 4;

    console.log(b)
})