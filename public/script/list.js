function list(type,class1,type2) {
// начинается список
    document.write("<" + type + "l class=" + class1 + " type=" + type2 + ">")
    for (var i = 3; i < list.arguments.length; i++) {
// Повторить для каждого аргумента
        document.write("<li>" + list.arguments[i]+"</li>");
    }
// заканчивается список
    document.write("</" + type + "l>")
}

