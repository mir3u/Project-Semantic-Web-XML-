const rdf = require('rdf');
const { NamedNode, BlankNode, Literal } = rdf;

export function f() {
    const namednode = new NamedNode('http://localhost/lab8crustacean.rdf');
    namednode.toNT();
    console.log(namednode.toNT());
}

