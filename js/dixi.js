;(function ($) {
	$.dixi = $.dixi || {};
    $.dixi = {
        version: '1.0',
        enMonthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        getEnMonthName: function () {
            return this.enMonthNames[this.getMonth()];
        },
        cnMonthNames: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
        get_current_datetime: function () {
            var dt = new Date();
            //return dt.getFullYear() + '年' + (dt.getMonth() + 1) + '月' + dt.getDate() + '日';
            return dt.getFullYear() + '年' + (dt.getMonth() + 1) + '月' + dt.getDate() + '日 ' + dt.getHours() + '时' + dt.getMinutes() + '分' + dt.getSeconds() + '秒';
        },
		getMonth: function() {
			var dt = new Date();
			return dt.getMonth();
		},
        getCNMonthName: function () {
            return this.cnMonthNames[this.getMonth()];
        },
        getShortMonthName: function () {
            return this.getENMonthName().substr(0, 3);
        },
        get_birthday_array: function (birthday) {
            if (birthday === null || birthday === undefined || (typeof birthday === 'undefined')) {
                return new Array();
            }
            var b = new Date(birthday);
            var d = ("0" + (b.getDate())).slice(-2);
            return [b.toDateString(), b.getShortMonthName(), d, b.getFullYear()];
        }
    };
})(jQuery);