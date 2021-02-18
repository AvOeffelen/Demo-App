import GenderEnum from "../enums/GenderEnum.js";


export default {

    key: "gender",
    filter: (value) => {

        return (Object.keys(GenderEnum).find(key => GenderEnum[key].toString() === value.toString()) || value).toLowerCase();
    }
}
