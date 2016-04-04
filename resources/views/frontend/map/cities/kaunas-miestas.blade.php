<!--
<ul class="mikrorajonai">
    @foreach($city_db->getJunctions()->get() as $junction)
        <li>{{ $junction->name }}</li>
    @endforeach
</ul>
-->
<div class="vilnius-map">
    <img id="myimg" src="{{ URL::to('/') }}/img/cities/{{ $city_db->slug }}-map.png" alt="{{ $city_db->slug }} map" use="#mymap">
    <map name="mymap" id="region">
        <area shape="poly" alt="" data-name="sanciu" coords="473,244, 470,245, 470,246, 468,246, 468,246, 467,246, 467,247, 465,247, 465,248, 463,248, 463,249, 462,249, 461,250, 459,250, 458,252, 457,252, 456,254, 455,254, 455,254, 449,254, 444,255, 440,262, 440,262, 440,263, 439,263, 439,265, 438,265, 438,267, 437,267, 436,269, 431,273, 423,281,
420,283, 420,282, 419,282, 419,285, 418,285, 418,285, 416,285, 416,286, 415,286, 415,287, 414,287, 410,291, 409,291, 407,293, 406,294, 406,295, 398,301, 398,304, 400,308, 401,308, 401,310, 401,310, 401,312, 403,322, 402,332, 402,339, 401,346, 401,354, 402,354, 402,359, 403,359, 403,361, 403,361, 403,363, 404,363, 404,365,
405,365, 405,367, 405,367, 405,369, 406,369, 406,370, 406,370, 406,371, 407,371, 407,372, 408,372, 408,373, 408,373, 408,375, 410,375, 410,376, 411,377, 411,378, 413,379, 413,380, 414,381, 416,383, 417,383, 417,384, 419,384, 419,386, 420,386, 421,387, 422,387, 423,388, 425,388, 425,389, 427,389, 427,390, 431,390, 431,391,
442,391, 442,390, 445,390, 445,390, 451,388, 451,387, 454,387, 455,385, 456,385, 457,384, 459,382, 460,380, 461,380, 461,379, 461,379, 461,377, 462,377, 462,376, 462,376, 462,375, 463,375, 463,374, 464,374, 464,373, 464,373, 465,369, 467,369, 467,367, 468,366, 468,365, 470,364, 470,363, 471,363, 471,361, 472,361, 472,360,
473,360, 473,358, 474,358, 474,357, 474,357, 474,356, 475,356, 475,354, 476,354, 476,353, 477,353, 477,352, 478,352, 478,350, 478,350, 478,349, 479,349, 479,346, 480,346, 481,344, 481,344, 481,342, 482,342, 482,340, 483,340, 483,338, 483,338, 483,336, 484,336, 484,332, 484,332, 485,326, 484,321, 484,318, 483,318, 483,316,
483,316, 483,314, 482,314, 482,312, 481,312, 481,311, 481,311, 480,308, 479,308, 479,307, 478,307, 478,306, 477,305, 477,304, 476,303, 476,302, 475,302, 475,300, 475,300, 475,298, 474,298, 474,294, 473,294, 473,288, 473,288, 475,273, 475,273, 476,269, 477,269, 477,268, 478,268, 478,267, 478,267, 478,266, 479,265, 479,264,
481,263, 481,262, 481,262, 482,260, 479,254, 478,254, 478,252, 477,252, 477,251, 476,251, 476,249, 475,249, 473,244, 473,244" href="sanciu">
        <area shape="poly" alt="" coords="273,234, 273,236, 275,237, 275,238, 280,242, 281,244, 283,244, 284,247, 286,247, 286,248, 289,248, 289,249, 292,250, 292,251, 294,251, 294,251, 295,251, 295,252, 298,252, 298,252, 300,252, 300,253, 311,253, 311,253, 315,253, 315,254, 320,254, 320,254, 324,254, 324,255, 327,255, 327,256,
330,256, 330,257, 332,257, 332,257, 333,257, 333,258, 335,258, 335,258, 338,259, 338,259, 341,260, 341,260, 342,260, 342,261, 344,261, 344,262, 345,262, 345,262, 348,263, 348,263, 352,264, 352,265, 353,265, 353,266, 354,266, 354,266, 356,266, 356,267, 357,267, 358,268, 359,268, 359,268, 360,268, 360,269, 362,269, 362,269,
363,269, 363,270, 364,270, 364,271, 365,271, 366,272, 369,273, 370,274, 371,274, 371,275, 372,275, 373,276, 374,276, 375,277, 376,277, 377,278, 378,278, 379,279, 380,279, 380,280, 382,281, 382,282, 383,282, 383,282, 386,284, 386,285, 388,286, 388,288, 389,289, 389,290, 391,290, 391,292, 392,292, 392,293, 393,294, 394,296,
395,297, 396,300, 397,300, 403,294, 409,288, 417,283, 417,274, 420,273, 415,263, 414,263, 414,262, 414,262, 414,258, 414,258, 413,254, 415,250, 415,250, 415,245, 415,245, 415,243, 414,243, 414,242, 413,242, 413,240, 413,240, 413,233, 408,234, 402,235, 396,228, 394,228, 394,227, 393,227, 393,226, 391,226, 391,226, 388,225,
385,225, 385,225, 381,226, 381,227, 380,227, 380,228, 372,228, 370,224, 367,225, 365,221, 363,221, 358,224, 358,225, 356,225, 355,227, 354,227, 353,228, 352,228, 352,229, 350,229, 350,231, 349,231, 347,233, 346,233, 346,234, 344,234, 344,235, 341,237, 337,235, 336,234, 336,234, 336,232, 332,232, 332,231, 330,230, 327,229,
325,230, 325,230, 324,228, 318,225, 315,221, 313,221, 312,222, 311,222, 310,224, 309,224, 309,225, 305,225, 305,226, 303,226, 303,227, 301,227, 301,227, 298,228, 298,229, 295,229, 295,230, 293,230, 293,230, 291,230, 291,231, 289,231, 289,231, 287,231, 287,232, 286,232, 286,232, 283,232, 273,234" href="centro">
        <area shape="poly" alt="" coords="172,355, 174,360, 175,360, 175,362, 176,362, 176,363, 176,363, 176,365, 177,365, 177,368, 178,368, 179,370, 179,370, 179,372, 180,372, 181,375, 181,375, 181,376, 182,376, 182,378, 183,378, 183,380, 184,380, 184,382, 184,382, 185,384, 186,384, 186,386, 186,386, 187,388, 188,388, 188,390,
188,390, 189,392, 189,392, 189,394, 190,394, 191,396, 191,396, 191,398, 192,398, 193,400, 193,400, 193,402, 194,402, 195,404, 195,404, 195,406, 196,406, 196,407, 196,407, 196,409, 197,409, 198,411, 198,411, 198,413, 199,413, 200,415, 200,415, 200,417, 202,421, 203,421, 207,417, 207,416, 210,414, 210,413, 213,411, 213,410,
215,408, 215,407, 218,405, 218,405, 219,405, 220,403, 221,403, 222,402, 223,402, 224,400, 226,400, 226,399, 227,399, 228,397, 229,397, 230,396, 236,394, 241,397, 241,398, 242,398, 243,399, 244,399, 245,400, 246,400, 247,402, 248,402, 248,403, 250,403, 250,404, 253,405, 253,406, 255,406, 262,410, 262,413, 255,430, 256,430,
261,432, 261,432, 264,432, 264,433, 266,433, 266,433, 269,433, 269,434, 272,434, 272,434, 274,434, 274,435, 276,435, 276,435, 279,435, 290,438, 292,431, 292,428, 292,428, 292,426, 293,426, 293,424, 293,424, 293,421, 294,421, 294,419, 295,419, 295,417, 295,417, 295,414, 299,399, 300,399, 303,398, 307,401, 307,401, 309,401,
309,402, 310,402, 310,402, 312,402, 312,403, 315,404, 315,405, 321,405, 321,406, 322,406, 323,407, 334,407, 334,407, 343,408, 352,411, 358,410, 364,411, 364,414, 370,414, 371,415, 371,416, 372,416, 372,418, 372,418, 373,420, 380,421, 380,421, 381,421, 381,422, 390,423, 390,422, 392,422, 393,420, 395,420, 396,421, 396,421,
401,421, 401,420, 403,421, 406,430, 406,429, 409,425, 415,424, 420,426, 422,422, 428,422, 426,418, 423,414, 421,414, 419,414, 418,416, 415,417, 411,414, 406,409, 401,405, 400,403, 401,403, 402,402, 404,402, 404,401, 405,401, 406,399, 407,398, 408,396, 411,395, 411,383, 409,381, 408,380, 407,378, 406,378, 405,374, 404,373,
404,372, 403,372, 403,371, 403,371, 403,369, 402,369, 402,368, 401,368, 401,366, 401,366, 401,364, 400,364, 400,362, 400,362, 400,360, 399,360, 399,355, 398,355, 398,347, 399,338, 399,328, 399,314, 394,302, 393,300, 392,299, 392,297, 390,297, 390,294, 389,294, 388,292, 387,292, 387,291, 385,290, 385,288, 383,287, 383,285,
382,285, 382,284, 381,284, 380,283, 378,283, 378,282, 377,282, 376,281, 375,281, 375,280, 373,280, 373,278, 372,278, 372,278, 370,278, 370,277, 369,277, 369,277, 368,277, 368,276, 367,276, 367,276, 366,276, 365,275, 363,274, 363,274, 361,274, 361,273, 360,273, 360,272, 359,272, 359,272, 358,272, 358,271, 357,271, 357,271,
354,270, 354,269, 352,269, 352,268, 350,268, 350,268, 349,268, 349,267, 348,267, 348,267, 347,267, 347,266, 344,266, 344,265, 343,265, 343,264, 341,264, 341,264, 339,263, 339,263, 337,263, 337,262, 336,262, 336,262, 333,261, 333,260, 329,260, 329,259, 328,259, 328,259, 326,259, 326,258, 323,258, 323,257, 319,257, 319,257,
315,257, 315,256, 311,256, 311,256, 300,256, 300,255, 295,255, 295,254, 293,254, 293,254, 290,253, 290,252, 288,252, 288,251, 286,251, 286,250, 285,250, 284,249, 283,249, 283,248, 282,248, 279,245, 278,245, 276,243, 274,242, 274,241, 273,240, 273,238, 271,237, 271,236, 270,235, 269,233, 267,233, 264,229, 263,229, 261,227,
260,227, 258,225, 257,225, 256,223, 255,223, 254,222, 253,222, 252,220, 251,220, 250,219, 248,219, 248,218, 245,217, 244,216, 242,215, 241,214, 240,214, 240,214, 239,214, 239,213, 235,212, 235,211, 233,211, 233,211, 223,210, 200,206, 192,206, 174,210, 163,211, 156,211, 156,211, 154,215, 153,218, 153,218, 153,219, 157,219,
157,220, 158,220, 158,220, 162,221, 162,222, 163,222, 163,222, 169,223, 169,224, 170,224, 170,224, 172,224, 172,225, 173,225, 173,225, 175,225, 175,226, 177,226, 177,227, 179,227, 179,227, 181,227, 181,228, 182,228, 182,228, 184,228, 184,229, 186,229, 186,229, 188,229, 188,230, 194,231, 194,232, 196,232, 196,232, 198,232,
198,233, 202,232, 202,233, 206,233, 206,233, 216,234, 216,234, 224,234, 236,235, 246,237, 248,237, 248,238, 250,238, 253,239, 256,241, 256,249, 258,253, 259,258, 259,258, 259,260, 260,260, 260,261, 261,261, 261,263, 261,263, 261,264, 262,264, 263,270, 264,270, 265,275, 266,275, 264,280, 264,283, 263,288, 263,294, 264,301,
264,308, 264,325, 261,327, 259,327, 259,328, 258,328, 258,328, 255,328, 255,329, 252,329, 252,329, 248,330, 248,330, 246,330, 246,331, 243,331, 243,332, 241,332, 241,332, 240,332, 240,333, 235,333, 235,334, 233,334, 233,334, 229,334, 225,333, 225,333, 222,331, 222,332, 216,335, 215,335, 215,335, 214,335, 214,336, 212,336,
212,336, 211,336, 211,337, 210,337, 210,338, 190,346, 190,347, 188,347, 188,348, 187,348, 187,348, 185,348, 185,349, 184,349, 184,349, 183,349, 183,350, 182,350, 182,351, 179,351, 179,352, 178,352, 178,352, 176,352, 176,353, 172,355" href="aleksoto">
        <area shape="poly" alt="" coords="439,191, 438,197, 438,202, 438,202, 440,203, 443,206, 444,206, 447,210, 448,210, 449,211, 450,211, 451,213, 452,213, 455,216, 456,216, 456,222, 457,222, 457,228, 457,228, 457,232, 458,232, 458,236, 458,239, 457,239, 453,243, 453,243, 452,245, 453,245, 455,249, 455,252, 456,252, 461,248,
462,246, 463,246, 463,246, 466,245, 466,245, 467,245, 467,244, 469,244, 469,244, 472,243, 472,243, 474,242, 474,243, 475,245, 476,247, 477,247, 478,251, 479,251, 479,253, 480,253, 480,255, 481,255, 481,256, 481,256, 481,258, 482,258, 483,260, 486,258, 486,257, 487,257, 488,256, 490,255, 491,254, 492,254, 492,254, 493,254,
493,253, 495,253, 495,252, 497,252, 497,252, 499,252, 499,251, 502,251, 502,251, 510,251, 519,252, 521,248, 521,247, 522,247, 522,245, 522,245, 522,241, 521,237, 516,234, 514,228, 516,225, 518,223, 518,222, 520,221, 520,220, 522,219, 522,218, 524,216, 524,215, 525,214, 535,192, 533,192, 533,191, 530,190, 530,190, 526,190,
515,188, 502,188, 487,187, 481,187, 481,186, 469,186, 450,190, 439,190, 439,191" href="griciupio">
        <area shape="poly" alt="" coords="368,135, 364,153, 364,153, 364,156, 363,156, 363,158, 362,158, 362,161, 362,161, 362,165, 361,165, 361,171, 357,186, 356,186, 356,187, 354,187, 352,190, 351,190, 349,192, 348,192, 347,194, 346,194, 345,195, 344,195, 344,195, 343,195, 343,196, 342,196, 342,196, 337,198, 337,199, 336,200,
336,201, 334,202, 334,203, 332,205, 332,206, 327,210, 316,219, 316,220, 317,221, 318,222, 320,224, 320,224, 321,224, 321,225, 324,226, 326,228, 330,227, 331,229, 332,229, 333,230, 336,229, 336,230, 338,234, 341,235, 347,231, 349,229, 350,229, 350,228, 352,228, 352,227, 353,227, 354,225, 355,225, 356,224, 358,224, 358,222,
359,222, 359,222, 361,221, 362,220, 366,220, 366,221, 368,223, 370,222, 373,226, 379,226, 382,225, 382,225, 383,225, 383,224, 384,224, 384,223, 385,223, 385,223, 388,224, 390,225, 393,225, 393,226, 395,226, 395,226, 396,226, 396,227, 398,227, 398,227, 399,227, 399,228, 400,228, 404,234, 414,231, 414,231, 414,231, 414,240,
415,240, 415,241, 416,241, 416,243, 416,243, 416,244, 417,244, 417,248, 418,248, 417,254, 416,254, 416,259, 417,259, 416,260, 416,261, 416,261, 416,262, 417,262, 418,265, 419,265, 419,267, 419,267, 419,268, 421,268, 422,273, 423,273, 422,274, 422,275, 420,275, 420,280, 422,280, 432,270, 435,268, 435,267, 435,267, 435,266,
436,266, 436,265, 436,265, 436,264, 437,264, 437,262, 438,262, 439,259, 440,259, 440,257, 440,257, 442,253, 453,253, 452,247, 451,247, 451,246, 450,246, 451,241, 453,240, 453,240, 456,238, 454,217, 449,214, 449,213, 448,213, 445,210, 444,210, 442,207, 441,207, 438,203, 436,203, 436,199, 437,195, 437,191, 436,190, 430,190,
430,190, 427,188, 424,187, 424,186, 428,183, 429,182, 430,182, 432,179, 433,179, 435,177, 436,177, 438,174, 439,174, 441,172, 442,172, 445,169, 446,169, 447,168, 447,168, 448,167, 449,167, 451,164, 452,164, 454,162, 456,161, 458,159, 455,155, 453,153, 453,152, 451,151, 451,150, 448,150, 448,150, 445,150, 445,149, 443,149,
443,149, 440,149, 440,148, 438,148, 438,148, 435,148, 435,147, 430,146, 429,146, 429,142, 420,140, 419,142, 407,140, 407,147, 404,148, 404,147, 400,147, 390,145, 389,142, 389,138, 382,137, 378,137, 368,135" href="zaliakalnio">
        <area shape="poly" alt="" coords="517,233, 522,235, 525,245, 524,245, 524,246, 523,246, 523,248, 520,253, 525,256, 526,256, 526,257, 529,257, 529,259, 531,259, 531,260, 532,260, 534,262, 535,262, 536,263, 540,267, 540,268, 543,270, 543,271, 544,271, 544,273, 545,273, 550,286, 553,307, 554,307, 554,309, 554,309, 554,310,
555,310, 555,312, 555,312, 555,313, 556,313, 556,314, 557,315, 558,317, 564,322, 567,326, 572,328, 578,329, 584,331, 584,331, 588,331, 590,330, 590,324, 592,318, 593,318, 593,317, 595,315, 595,315, 596,315, 597,313, 599,313, 600,312, 601,312, 603,315, 602,315, 604,318, 604,318, 605,322, 605,327, 608,327, 609,326, 609,327,
614,328, 615,329, 616,329, 618,332, 620,332, 621,334, 622,334, 624,335, 628,335, 628,335, 630,335, 631,331, 631,323, 631,317, 630,312, 627,302, 629,301, 630,300, 630,299, 631,299, 631,298, 632,298, 632,294, 629,290, 626,290, 626,283, 634,283, 634,291, 635,291, 637,288, 638,283, 636,283, 633,282, 630,283, 630,282, 627,282,
626,280, 626,279, 625,279, 625,277, 624,277, 625,276, 625,273, 622,269, 624,267, 626,267, 629,268, 629,269, 630,270, 631,272, 632,272, 633,275, 635,275, 636,277, 637,277, 637,276, 637,276, 637,272, 636,271, 636,270, 635,269, 635,269, 629,267, 625,263, 624,263, 624,260, 626,257, 627,257, 629,255, 630,255, 631,254, 633,253,
634,252, 635,252, 635,252, 636,252, 636,251, 638,251, 638,251, 640,251, 640,250, 641,250, 641,250, 643,250, 643,249, 649,248, 649,248, 652,248, 652,247, 657,247, 657,246, 658,246, 658,245, 660,245, 660,245, 662,245, 662,244, 664,244, 664,244, 666,244, 666,243, 669,243, 669,242, 677,241, 677,240, 679,240, 679,239, 681,239,
681,239, 684,237, 684,237, 686,237, 686,236, 687,236, 687,236, 688,236, 688,235, 690,235, 690,234, 692,234, 693,233, 697,232, 697,231, 698,231, 699,229, 701,229, 702,228, 703,228, 703,227, 705,227, 706,224, 707,224, 708,220, 709,220, 710,217, 711,216, 711,214, 712,214, 712,212, 713,212, 713,210, 714,210, 714,209, 714,209,
714,208, 715,208, 715,206, 715,206, 716,204, 717,204, 717,202, 718,202, 718,201, 720,200, 720,199, 724,195, 726,193, 727,193, 728,191, 731,191, 731,190, 732,190, 732,189, 735,188, 735,188, 737,188, 737,187, 738,187, 738,187, 740,187, 740,186, 741,186, 742,184, 745,184, 748,180, 749,180, 749,179, 760,176, 774,175, 783,175,
783,175, 785,175, 785,176, 788,176, 788,177, 789,177, 789,177, 791,177, 791,179, 792,179, 793,180, 794,180, 795,181, 796,181, 797,182, 801,183, 803,182, 804,181, 801,179, 801,178, 800,178, 799,177, 798,177, 797,175, 795,175, 794,174, 793,174, 792,172, 791,172, 789,170, 788,170, 787,168, 786,168, 785,167, 784,167, 782,165,
781,165, 780,163, 779,163, 778,161, 776,161, 775,160, 774,160, 773,158, 772,158, 771,157, 770,157, 769,156, 768,156, 767,154, 766,154, 765,153, 764,153, 763,151, 761,151, 761,150, 760,150, 758,148, 757,148, 757,147, 755,147, 755,146, 754,146, 752,144, 751,144, 751,143, 749,143, 749,142, 748,142, 746,140, 745,140, 745,139,
743,139, 742,137, 741,137, 740,136, 738,135, 738,135, 701,130, 697,135, 696,135, 696,136, 695,136, 694,138, 693,138, 691,140, 688,140, 688,140, 688,131, 687,131, 687,128, 685,128, 685,126, 667,124, 667,124, 662,124, 662,123, 656,123, 656,123, 651,123, 633,120, 606,117, 589,113, 582,112, 582,112, 582,112, 581,115, 580,115,
580,117, 580,117, 580,119, 579,119, 579,120, 578,120, 578,121, 572,124, 572,135, 572,138, 572,142, 571,160, 563,161, 560,160, 555,160, 542,166, 541,180, 541,180, 541,181, 540,181, 540,183, 539,183, 539,186, 538,186, 538,187, 538,187, 537,191, 536,191, 536,192, 536,192, 536,194, 535,194, 535,195, 534,195, 534,197, 534,197,
533,199, 533,199, 533,201, 532,201, 532,202, 531,202, 531,206, 530,206, 530,207, 529,207, 529,209, 529,209, 528,212, 528,212, 528,213, 527,213, 527,214, 526,215, 526,216, 524,217, 524,219, 522,220, 522,221, 520,222, 520,223, 518,225, 515,229, 517,233, 517,233" href="petrasiunu">
        <area shape="poly" alt="" coords="569,158, 571,123, 577,119, 580,111, 568,108, 559,108, 559,107, 549,107, 549,107, 546,108, 546,108, 545,108, 545,109, 541,110, 541,110, 540,110, 540,111, 538,111, 538,111, 537,111, 537,112, 531,113, 531,113, 529,113, 529,114, 527,114, 527,115, 525,115, 525,115, 523,115, 523,116, 521,116,
521,116, 517,117, 517,117, 513,117, 513,119, 511,119, 509,121, 508,121, 505,124, 504,124, 502,127, 500,127, 498,130, 497,130, 494,133, 493,133, 491,136, 490,136, 487,139, 485,139, 483,142, 482,142, 481,144, 479,144, 476,148, 475,148, 474,149, 472,150, 472,151, 471,151, 468,153, 467,153, 467,155, 465,156, 465,156, 464,156,
461,159, 460,159, 458,162, 456,162, 455,164, 453,164, 452,167, 450,167, 448,169, 447,169, 445,172, 444,172, 441,175, 440,175, 438,177, 437,177, 435,179, 434,179, 432,181, 431,182, 430,183, 427,185, 427,185, 428,185, 435,188, 445,188, 451,188, 451,187, 453,187, 453,187, 455,187, 455,186, 458,186, 467,184, 470,184, 470,183,
472,184, 478,184, 478,184, 484,184, 484,185, 490,185, 500,186, 512,186, 529,187, 529,188, 531,188, 531,188, 535,189, 535,189, 535,189, 538,183, 538,183, 538,181, 539,181, 539,180, 540,180, 540,165, 541,164, 543,164, 544,162, 545,162, 546,161, 549,160, 549,160, 551,160, 551,159, 553,159, 553,159, 555,159, 555,159, 569,158,
569,158" href="dainavos">
        <area shape="poly" alt="" coords="359,88, 357,101, 356,101, 355,109, 353,109, 353,111, 352,112, 351,114, 350,115, 349,117, 348,118, 347,120, 346,120, 346,123, 344,123, 344,126, 343,126, 342,128, 341,129, 340,131, 339,132, 338,134, 337,135, 336,137, 335,137, 335,140, 333,140, 333,143, 332,143, 331,145, 330,146, 330,147,
323,150, 323,151, 323,151, 323,152, 322,152, 322,154, 321,154, 321,155, 321,155, 320,157, 319,157, 319,159, 318,159, 318,162, 317,162, 317,163, 316,163, 316,164, 316,164, 316,165, 315,165, 315,166, 315,166, 312,172, 305,175, 305,176, 302,176, 302,177, 300,177, 300,178, 299,178, 299,178, 298,178, 298,179, 297,179, 297,179,
295,179, 295,180, 294,180, 294,181, 293,181, 293,181, 292,181, 292,182, 291,182, 290,183, 289,183, 289,183, 285,185, 285,184, 284,183, 284,182, 282,180, 282,180, 281,180, 279,175, 276,174, 276,171, 276,171, 276,168, 277,168, 277,167, 278,167, 278,165, 279,165, 279,164, 279,164, 280,162, 279,162, 276,165, 274,167, 273,167,
271,169, 269,169, 268,171, 267,171, 266,172, 260,172, 256,172, 251,172, 251,176, 246,176, 242,176, 239,179, 235,181, 230,178, 230,177, 229,177, 228,176, 227,176, 226,175, 225,175, 224,174, 222,173, 221,172, 220,172, 220,171, 217,171, 217,169, 215,170, 210,170, 210,170, 206,171, 206,170, 203,169, 203,169, 202,169, 201,168,
201,168, 200,166, 199,166, 198,165, 197,165, 195,162, 194,162, 192,161, 191,161, 189,158, 188,158, 186,156, 185,155, 184,154, 183,154, 182,153, 180,152, 179,151, 178,151, 177,150, 176,150, 175,148, 174,148, 173,147, 171,146, 171,146, 170,146, 170,145, 168,144, 167,143, 165,142, 164,141, 162,140, 161,139, 158,139, 158,138,
157,138, 157,138, 153,137, 153,137, 148,136, 141,136, 136,136, 136,137, 133,137, 133,137, 130,137, 130,138, 128,138, 128,138, 125,138, 125,139, 121,139, 121,140, 119,140, 119,141, 117,141, 117,141, 114,141, 114,142, 110,142, 110,142, 102,142, 93,139, 93,138, 91,138, 90,136, 89,136, 88,135, 87,134, 87,129, 86,129, 86,125,
83,125, 83,123, 80,122, 80,123, 79,123, 78,125, 77,125, 76,127, 75,127, 74,128, 73,128, 72,129, 70,130, 70,130, 65,130, 65,130, 64,130, 63,128, 58,127, 58,126, 55,122, 55,121, 53,121, 53,120, 48,119, 40,115, 30,113, 30,112, 28,112, 28,111, 26,111, 26,111, 24,111, 24,110, 23,110, 23,110, 18,108, 18,108, 12,108, 4,109, 0,111,
1,111, 3,112, 3,112, 4,112, 5,114, 6,114, 6,114, 7,114, 8,115, 9,115, 10,117, 12,117, 13,119, 14,119, 15,120, 16,120, 16,121, 18,121, 18,122, 19,122, 21,124, 22,124, 22,125, 24,125, 25,127, 26,127, 28,129, 29,129, 31,132, 32,132, 37,137, 40,139, 40,140, 42,140, 47,146, 48,146, 53,151, 54,151, 56,153, 57,153, 58,155, 60,155,
61,157, 62,157, 63,158, 64,159, 64,159, 66,159, 66,160, 67,160, 68,162, 69,162, 70,163, 72,163, 72,164, 73,164, 74,166, 75,166, 76,167, 78,167, 79,169, 80,169, 81,171, 83,171, 84,173, 85,173, 85,174, 87,174, 88,176, 90,176, 91,178, 92,178, 94,180, 95,180, 97,182, 98,182, 100,185, 101,185, 103,188, 105,188, 107,190, 108,190,
110,193, 111,193, 112,194, 114,194, 114,196, 115,196, 116,197, 118,197, 118,198, 120,198, 121,200, 122,200, 123,201, 124,201, 125,202, 126,202, 126,202, 127,202, 127,203, 129,203, 129,204, 136,205, 152,208, 171,207, 174,207, 174,207, 177,207, 177,206, 180,206, 180,205, 182,205, 182,205, 184,205, 184,204, 187,204, 187,203,
190,203, 190,203, 199,202, 199,203, 205,203, 205,203, 209,203, 226,207, 235,209, 235,209, 238,210, 238,211, 242,212, 243,213, 246,214, 247,216, 249,216, 250,217, 251,217, 251,218, 253,219, 254,220, 255,220, 256,221, 257,221, 258,223, 259,223, 260,224, 261,224, 263,227, 264,227, 267,230, 269,230, 269,231, 270,232, 270,233,
271,233, 271,232, 275,232, 275,232, 278,232, 278,231, 281,231, 281,230, 283,230, 283,230, 286,230, 286,229, 288,229, 288,229, 289,229, 289,228, 294,227, 294,226, 296,226, 296,226, 298,226, 298,225, 300,225, 300,225, 302,225, 302,224, 305,223, 305,222, 308,222, 308,221, 311,220, 312,219, 313,219, 314,217, 315,217, 317,215,
318,215, 320,213, 321,213, 321,212, 323,211, 324,209, 327,207, 327,206, 330,203, 330,202, 333,199, 333,198, 334,198, 336,195, 337,195, 337,195, 339,195, 339,194, 340,194, 340,194, 342,194, 342,193, 343,193, 343,193, 344,193, 344,192, 345,192, 353,185, 353,184, 354,183, 354,182, 355,182, 358,167, 358,162, 362,145, 366,128,
366,121, 365,114, 366,108, 365,99, 366,89, 359,88" href="vilijampoles">
        <area shape="poly" alt="" coords="368,133, 375,134, 379,134, 379,135, 384,135, 384,135, 388,136, 390,137, 391,137, 391,142, 392,143, 392,143, 392,144, 395,144, 395,144, 399,144, 405,145, 405,138, 412,139, 418,140, 419,137, 426,139, 431,141, 432,141, 432,145, 452,149, 456,153, 459,158, 460,158, 462,156, 463,156, 465,153,
467,153, 468,151, 470,151, 472,148, 473,148, 476,144, 477,144, 480,142, 481,142, 482,140, 484,139, 484,139, 485,139, 487,136, 488,136, 491,133, 492,133, 494,130, 496,130, 498,127, 499,127, 502,124, 503,124, 505,122, 507,122, 509,119, 510,119, 511,118, 513,116, 513,115, 515,113, 518,110, 516,104, 515,103, 513,97, 515,96,
519,96, 525,94, 525,94, 528,94, 528,93, 531,93, 541,91, 544,91, 544,91, 548,89, 548,89, 551,86, 551,86, 547,86, 543,87, 538,87, 520,89, 516,86, 514,83, 510,80, 509,79, 508,79, 505,76, 502,73, 501,69, 500,69, 500,65, 498,56, 490,55, 484,53, 481,53, 481,52, 479,52, 479,51, 476,51, 471,49, 470,47, 471,46, 471,45, 473,44, 475,39,
474,38, 469,35, 466,35, 462,31, 462,21, 464,20, 465,5, 463,4, 463,4, 461,4, 461,3, 459,3, 459,3, 454,3, 454,2, 452,2, 452,3, 444,3, 444,3, 439,3, 439,4, 434,4, 434,4, 431,4, 431,5, 428,5, 428,5, 425,5, 425,6, 422,6, 422,7, 420,7, 420,7, 418,7, 418,8, 416,8, 416,8, 415,8, 415,9, 413,9, 413,9, 411,9, 411,10, 408,10, 408,11,
407,11, 407,12, 406,12, 405,13, 404,13, 404,13, 402,14, 398,12, 394,16, 393,16, 393,17, 390,20, 390,21, 388,22, 388,23, 387,24, 387,25, 385,26, 385,27, 384,28, 384,29, 383,30, 383,31, 382,31, 381,34, 380,34, 380,35, 379,35, 379,36, 379,36, 379,38, 378,38, 378,39, 377,39, 377,41, 376,41, 376,43, 375,43, 374,49, 373,49, 373,50,
373,50, 373,52, 372,52, 372,54, 371,54, 371,56, 371,56, 371,57, 370,57, 370,61, 369,61, 370,80, 369,80, 369,100, 368,100, 368,106, 369,111, 368,133, 368,133" href="eiguliu">
        <area shape="poly" alt="" coords="319,32, 319,33, 316,35, 312,37, 311,34, 310,34, 310,33, 309,33, 309,31, 309,31, 309,30, 308,30, 308,29, 307,29, 307,27, 306,27, 306,26, 306,26, 304,22, 301,22, 298,24, 293,26, 289,33, 288,35, 285,42, 289,46, 288,47, 282,50, 272,52, 272,51, 266,51, 266,52, 264,52, 264,52, 263,52, 263,53,
257,54, 256,58, 256,60, 255,60, 254,61, 253,61, 252,63, 251,63, 251,64, 249,64, 248,65, 247,65, 246,67, 245,67, 245,68, 243,68, 243,69, 241,69, 240,71, 239,71, 239,71, 169,71, 168,70, 167,47, 159,49, 159,49, 157,49, 157,50, 155,50, 155,51, 153,51, 153,51, 151,51, 151,52, 145,53, 145,53, 143,53, 143,54, 131,57, 130,56, 126,48,
126,46, 126,46, 126,45, 125,45, 125,43, 125,43, 123,39, 123,39, 123,38, 122,38, 122,37, 121,37, 121,36, 121,36, 121,35, 120,35, 120,34, 120,34, 120,32, 119,32, 119,31, 112,25, 112,30, 111,30, 110,36, 109,36, 109,38, 109,38, 109,39, 108,39, 108,43, 107,43, 100,72, 100,83, 100,83, 100,89, 99,89, 99,94, 99,94, 99,99, 98,99,
98,103, 97,103, 97,105, 97,105, 97,107, 96,107, 96,110, 96,110, 96,112, 95,112, 95,114, 94,114, 94,116, 92,118, 92,119, 91,119, 91,121, 90,121, 88,123, 88,126, 88,126, 88,133, 89,134, 91,135, 91,135, 92,135, 93,137, 94,137, 94,138, 96,138, 96,139, 99,139, 99,140, 101,140, 101,140, 105,140, 105,141, 116,139, 118,139, 118,138,
120,138, 120,138, 122,138, 122,137, 124,137, 124,137, 126,137, 126,136, 128,136, 128,136, 130,136, 138,134, 147,134, 147,134, 153,134, 153,135, 156,135, 156,136, 157,136, 157,137, 163,138, 163,140, 166,140, 166,141, 168,141, 168,142, 170,142, 170,144, 171,144, 172,145, 173,145, 174,146, 175,146, 175,146, 177,147, 177,148,
179,148, 179,149, 181,150, 183,152, 184,152, 185,153, 187,154, 188,156, 190,156, 190,157, 192,158, 194,160, 195,160, 196,162, 197,162, 199,164, 200,164, 202,166, 203,166, 205,168, 211,168, 217,168, 235,179, 237,177, 237,177, 238,177, 238,176, 240,175, 241,174, 249,174, 249,170, 254,169, 254,170, 264,170, 264,171, 266,171,
267,168, 269,168, 270,166, 272,166, 273,164, 274,164, 276,162, 277,162, 277,161, 280,160, 280,160, 281,164, 277,173, 281,174, 282,179, 284,179, 285,180, 285,180, 285,183, 286,183, 293,179, 293,179, 294,179, 294,178, 296,178, 296,177, 297,177, 297,177, 298,177, 298,176, 299,176, 299,176, 302,175, 302,174, 304,174, 305,173,
306,173, 306,172, 307,172, 307,172, 308,172, 308,171, 309,171, 312,167, 312,165, 313,165, 314,163, 314,163, 315,161, 316,161, 316,159, 317,159, 317,157, 318,157, 318,156, 318,156, 318,155, 319,155, 319,154, 319,154, 319,153, 320,153, 320,152, 321,152, 321,150, 321,150, 321,149, 322,149, 322,149, 324,148, 324,148, 326,148,
326,147, 327,147, 327,146, 329,146, 329,145, 329,145, 329,144, 330,143, 331,141, 332,140, 333,138, 334,137, 335,135, 336,134, 336,132, 338,132, 338,129, 339,129, 340,127, 341,126, 342,124, 343,123, 344,121, 345,120, 346,118, 347,117, 347,115, 349,115, 349,113, 350,113, 351,109, 352,109, 352,108, 353,108, 353,106, 353,106,
353,104, 354,104, 354,102, 355,102, 355,100, 355,100, 355,98, 356,98, 356,96, 357,96, 357,94, 357,94, 357,86, 367,87, 367,79, 368,79, 368,78, 367,78, 367,72, 368,71, 368,71, 367,71, 367,61, 368,61, 368,60, 368,60, 368,57, 369,57, 369,56, 369,56, 369,54, 370,54, 370,52, 371,52, 371,50, 371,50, 371,49, 372,49, 372,47, 373,47,
374,42, 374,42, 375,39, 376,39, 376,37, 377,37, 377,35, 378,35, 378,34, 379,34, 379,33, 379,33, 379,32, 381,31, 381,29, 383,28, 383,27, 384,26, 384,25, 385,25, 385,23, 387,23, 387,22, 388,20, 388,19, 391,17, 391,16, 393,15, 394,13, 395,13, 395,12, 396,12, 397,10, 388,3, 384,5, 380,7, 373,3, 373,3, 372,3, 372,2, 369,2, 363,9,
362,9, 362,10, 359,12, 359,13, 357,15, 357,16, 355,18, 355,19, 353,20, 353,21, 352,22, 352,23, 350,23, 350,24, 348,26, 348,27, 345,29, 345,30, 343,32, 343,33, 342,33, 341,34, 339,34, 335,31, 333,28, 332,28, 329,24, 328,25, 324,29, 319,32" href="silainiu">
    </map>
</div>

@include('frontend.parts.'.$type.'._filter_junction')