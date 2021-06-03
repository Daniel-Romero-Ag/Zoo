export default class JoinHelper {
    url
    result
    alias
    concatAlias

    constructor() {
        this.alias = []
        this.concatAlias = []
        this.url = "http://localhost/zoo/PHP/Apis/"
        this.result = []
    }

    setAlias(...alias) {
        alias.length == 0 ? this.alias = [] :
            this.alias = alias
    }
    setConcatAlias(...concatAlias) {
        concatAlias.length == 0 ? this.concatAlias = [] :
            this.concatAlias = concatAlias
    }

    async concatJoin(table, column1, column2) {
        const fetchs = await fetch(this.url + table)
        const result = await fetchs.json()
        const auxResult = []

        result.forEach(element1 => {
            this.result.forEach(element2 => {
                if (element1[column1] === element2[column2]) {
                    this.concatAlias.forEach(ali => {
                        if (ali[0] == table) {
                            element1 = {
                                ...element1,
                                [ali[2]]: element1[ali[1]]
                            }
                            delete element1[ali[1]]
                        }
                    })

                    auxResult.push({...element1, ...element2 })
                }
            })
        })
        this.concatAlias = []
        this.result = auxResult
        return this.result
    }

    async innerJoin(primerTabla, primerCampo, segundaTabla, segundoCampo) {
        this.result = []
        const consulta1 = await fetch(this.url + primerTabla)
        const json1 = await consulta1.json()
        const consulta2 = await fetch(this.url + segundaTabla)
        const json2 = await consulta2.json()


        json1.forEach(element1 => {
            json2.forEach(element2 => {
                if (element1[primerCampo] === element2[segundoCampo]) {
                    this.alias.forEach(ali => {
                        if (ali[0] == primerTabla) {
                            element1 = {
                                ...element1,
                                [ali[2]]: element1[ali[1]]
                            }
                            delete element1[ali[1]]
                        } else if (ali[0] == segundaTabla) {
                            element2 = {
                                ...element2,
                                [ali[2]]: element2[ali[1]]
                            }
                            delete element2[ali[1]]
                        }
                    })

                    this.result.push({...element2,
                        ...element1
                    })
                }

            })
        });
        this.alias = []
        return this.result
    }
}