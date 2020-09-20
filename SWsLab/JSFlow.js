var d = {
  e: () => console.log(this),
};
d.e();

var d = {
  e: function () {
    function f() {
      console.log(this);
    }
    f();
  },
};
d.e();

var d = {
  e: {
    g: function f2() {
      function f() {
        console.log(this);
      }
      f();
    },
  },
};
d.e.g();

var a = {
  b: function () {
    console.log(this);
  },
};
a.b();

var a = {
  b: {
    c: function () {
      console.log(this);
    },
  },
};
a.b.c();

var a = 10;
var obj = {
  a: 20,
  b: function () {
    console.log(this.a);
    function c() {
      console.log(this.a);
    }
    c();
  },
};
obj.b();

var a = 10;
var obj = {
  a: 20,
  b: function () {
    var self = this;
    console.log(this.a);
    function c() {
      console.log(self.a);
    }
    c();
  },
};
obj.b();

function a(x, y, z) {
  console.log(this, x, y, z);
}
var b = {
  c: "eee",
};

a(1, 2, 3); // window 1 2 3

a.call(b, 1, 2, 3);

function sum(arg1, arg2) {
  return arg1 + arg2;
}
sum.apply(null, [1, 2]);

o1 = { val1: 1, val2: 2, val3: 3 };
o2 = { v1: 10, v2: 50, v3: 100, v4: 25 };
function sum() {
  console.log(`this : ${this}`);
  var _sum = 0;
  for (name in this) {
    _sum += this[name];
  }
  return _sum;
}

console.log(sum.apply(o1)); // 6
console.log(sum.apply(o2)); // 185

function fn() {
  console.log(this);
}
var a1 = fn;
typeof a1;
a1();

var a2 = new fn();
typeof a2;
a2;

//
//
//
//
//
var funcThis = null;

function Func() {
  // 아직 o2는 할당이 안 되었기 때문에 undefined가 뜨게 된다.
  document.write(`o2 : ${o2} <br />`);
  funcThis = this;
}

var o2 = new Func();
if (funcThis === o2) {
  document.write("o2 <br />");
}
