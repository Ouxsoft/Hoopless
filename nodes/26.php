<div class="col-md-12 col-margin bg-1">
  <h2>The Problem</h2>
  <p>A simple yet interesting library function I programmed for FANUC&reg; RJ32 robots using KAREL was a square root function. In order to calculate some of the variable positions in my new program I needed to use Pythagorean\'s theorem, i.e. a<sup>2</sup> + b<sup>2</sup> = c<sup>2</sup>. To solve for any of the variables in this equation I needed to take the square root of the others. Unfortunately, the robotic controller did not have a square root function.</p>
</div>
<div class="col-md-12 col-margin bg-1">
  <h2>The Solution</h2>
  <p>I programmed a square root function using Newton\'s method of successive approximations in KAREL on the FANUC robotic controller because that was where the position coordinates were determined. Basically, the function performs an educated guess and checks whether the guess squared is within a specified range from the original number. If not, then a better guess is performed, i.e. (x/y<sup>2</sup> +2y) / 3 where y is an approximation to the cube root of x. If it is within the range, the value is returned.</p>
</div>
<div class="col-md-12 col-margin bg-1">
  <h2>The Code</h2>
  <p>Here is what that looks like in Fanuc code:</p>
  <pre><code class="language-fanuc">1:  !================================;
2:  ! WARNING: DO NOT MODIFY.;
3:  ! CUT_ALL SquareRoot Function;
4:  ! By: Matt Heroux;
5:  ! This is a math function that;
6:  ! determines the square root of;
7:  ! a positive number.;
8:  !================================;
9:  ;
10:  R[167]=AR[1];
11:  ;
12:  LBL[1];
13:  R[168]=(.5*(R[167]+(AR[1]/R[167])));
14:  ;
15:  R[169]=(R[167]-R[168]);
16:  !Get Absolute Value;
17:  IF R[169]>0,JMP LBL[2];
18:  R[169]=R[169]*(-1);
19:  LBL[2];
20:  ;
21:  R[167]=R[168];
22:  ;
23:  IF R[169]>.1,JMP LBL[1];
  </code>
</pre>
<p>This function came in very useful - it enabled the reporting of daily production rates. Previously, the client was unable to determine output accurately. Here is what that looks like in Fanuc code:</p>
<pre><code class="language-fanuc">1:  !================================;
2:  ! WARNING: DO NOT MODIFY.;
3:  ! CUT_ALL SquareFeet Function;
4:  ! By: Matt Heroux;
5:  ! This is a math function to;
6:  ! calculate the square feet done;
7:  ! based on jig size and how many;
8:  ! jigs are likely in use.;
9:  !================================;
10:  !--------------------------------;
11:  !Zero SquareFeet count if;
12:  !range is invalid.;
13:  !--------------------------------;
14:  IF R[3]>=0,JMP LBL[50];
15:  R[3]=0;
16:  LBL[50];
17:  ;
18:  !--------------------------------;
19:  !How many jigs are in use?;
20:  !--------------------------------;
21:  !Check if 1 jig(s) are in use.;
22:  IF (R[189]>24 OR R[190]>24),JMP LBL[1];
23:  !Check if 2 jig(s) are in use.;
24:  IF (R[189]>14 OR R[190]>14),JMP LBL[2];
25:  !Check if 3 jig(s) are in use.;
26:  IF (R[189]<=14 OR R[190]<=14),JMP LBL[3];
27:  ;
28:  !--------------------------------;
29:  !1 - Jig(s) in use.;
30:  !--------------------------------;
31:  LBL[1];
32:  ;
33:  !See which head to add Square;
34:  !feet to.;
35:  R[3]=(R[3]+(R[189]*R[190]/144));
36:  JMP LBL[86];
37:  ;
38:  !--------------------------------;
39:  !2 - Jig(s) in use.;
40:  !--------------------------------;
41:  LBL[2];
42:  ;
43:  !See which head to add Square;
44:  !feet to.;
45:  R[3]=(R[3]+(R[189]*R[190]/144*2));
46:  JMP LBL[86];
47:  ;
48:  !--------------------------------;
49:  !3 - Jig(s) in use.;
50:  !--------------------------------;
51:  LBL[3];
52:  ;
53:  !See which head to add Square;
54:  !feet to.;
55:  R[3]=(R[3]+(R[189]*R[190]/144*3));
66:  JMP LBL[86];
67:  ;
68:  LBL[86];
    </code>
  </pre>
</div>
